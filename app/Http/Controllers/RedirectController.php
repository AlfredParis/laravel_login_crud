<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use App\Models\Client;

class RedirectController extends Controller
{


    public function index()
    {
        return view('index')->with('alert', 'Index successfully redirected!');
        // return 'string';

    }
}