<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Pricing;

class PricingService{

    public function getAll(){
        return Pricing::whereStatus(true)->orderBy('order', 'asc')->get();
    }

}

