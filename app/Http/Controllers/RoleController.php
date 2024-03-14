<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // admin login page
    public function adminLoginPage() {
        return view('admin.login');
    }



}
