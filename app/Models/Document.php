<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];  
    
    public function getFilePath(){
        return storage_path("app/applications/{$this->application_id}/{$this->name}");
    }

}
