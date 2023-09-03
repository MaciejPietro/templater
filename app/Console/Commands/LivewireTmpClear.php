<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class LivewireTmpClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:upload-cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup temporary livewire files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expired_date = Carbon::now(config('app.timezone'));
        $expired_date->add(-5, 'days');

        $this->info('Deleting expired temporary files.');

        $files = Storage::allFiles(config('livewire.temporary_file_upload.directory'));

        foreach ($files as $file){
            if(Storage::lastModified($file) < $expired_date->timestamp){
                $this->line($file);
                Storage::delete($file);
                $this->info('Success!');
            }
        }

        $this->info('The command was successful!');

        return 0;
    }
}
