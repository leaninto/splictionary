<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list(){
    	$list = \App\Splictions::paginate(25);
    	\View::share('listItems', $list);
    	return view('admin.list');
    }
}
