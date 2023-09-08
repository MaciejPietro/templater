<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ReceiptService;
use App\Services\ApplicationService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('front.create.index');
    }


}
