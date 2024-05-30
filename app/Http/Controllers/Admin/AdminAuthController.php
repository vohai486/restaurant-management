<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    function index()
    {
        return view('admin.auth.login');
    }
    function forgetPassword()
    {
        return view('admin.auth.forget-password');
    }
}
