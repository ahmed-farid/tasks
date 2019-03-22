<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class DashBoardController extends Controller
{
    //

    public function index()
    {
    	$lastadmins = Admin::take(6)->orderBy('id', 'desc')->get();
    	return view('admin.index',compact('lastadmins'));
    }
}
