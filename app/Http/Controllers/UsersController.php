<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Services\UserService;
// use App\Services\ReceiptService;
// use App\Services\ApplicationService;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\LoginFormRequest;
// use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        return view('front.users.index');
    }


}
