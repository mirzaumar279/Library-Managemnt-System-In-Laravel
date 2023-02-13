<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use DB;
class home extends Controller
{
    public function index()
    {
        $book=DB::table('books')->count();
        $user=DB::table('usersses')->count();
        return view('layouts/app',compact('book','user'));
    }
}
