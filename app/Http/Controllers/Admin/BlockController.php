<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function menu()
    {
        return view('admin.block.menu');
    }

    public function menuStore(Request $request)
    {

    }
}
