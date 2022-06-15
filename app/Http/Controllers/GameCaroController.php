<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameCaroController extends Controller
{
    public function playComputer()
    {
        return view('caro');
    }

    public function playWithUser($id)
    {

    }
}
