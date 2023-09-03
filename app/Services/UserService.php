<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService{

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

}

