<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trustee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'dial_code',
        'is_admin',
        'gender',
        'date_of_birth',
        'passport',
        'issuing_country',
        'date_of_issue',
        'date_of_expiry',
        'country_of_residence',
        'address',
        'application_id',
        'diaspora_resident'
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }

}
