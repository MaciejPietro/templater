<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pricing_id',
        'name_of_diaspora_organisation',
        // 'operating_address',
        'email_address',
        'price',
        'status',
        'need_help',
        'zendesk_ticket_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }

    public function trustees()
    {
        return $this->hasMany(Trustee::class);
    }

    public function tmp_data()
    {
        return $this->hasMany(TmpData::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function getNoFormat()
    {
        return Str::padLeft($this->no, 4, '0');
    }

    public function getTruesteesAdmin(){
        return $this->trustees()->first() ?? new Trustee();
    }

    public function getReceiptPath(){
        return storage_path("app/applications/{$this->id}/receipt.pdf");
    }

    public function getStoragePathRaw(){
        return "applications/{$this->id}";
    }

    public function getAdress(){

        foreach ($this->trustees as $trustee){
            if($trustee->address)
                return $trustee->address;
        }

        return null;
    }

    public function getApplicantName(){

        foreach ($this->trustees as $trustee){
            if($trustee->name)
                return $trustee->name;
        }

        return null;
    }

}

