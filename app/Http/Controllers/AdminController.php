<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() // Protege a rota de admin. Só passa pela middleware se for um admin
    {
        $this->middleware('auth:admin');
    }

    public function index(){ // Retorna a view chamada no web.php
        return view('admin');
    }
}
