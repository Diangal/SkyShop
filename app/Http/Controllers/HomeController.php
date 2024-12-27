<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Supprimez cette ligne si elle existe
    }

    public function index()
    {
        return view('index');
    }
}