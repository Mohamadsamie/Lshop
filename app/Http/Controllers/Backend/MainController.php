<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function mainPage()
    {
        return view('admin.main.index');
    }
}

