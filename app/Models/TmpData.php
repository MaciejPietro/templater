<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'trustee_id',
        'is_file'
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
