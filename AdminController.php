<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use Session;
use Auth;

class AdminController extends Controller
{

public function __construct() {
            $this->middleware('auth:admin');

    }
public function index() {
    return view ('dash.dash');
}

}


