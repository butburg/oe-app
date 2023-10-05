<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'this value can be passed to our view';

        # pass value by using a second parameter
        //return view('pages.index', compact('title'));
        # pass a value onto it with arrow
        return view('pages.index')->with('title', $title);

    }

    public  function about(){
        return view('pages.about');
    }
    public  function impress(){
        return view('pages.impress');
    }

    public  function services(){
        $data = array(
            'title'=>'Services',
            'services'=>['one', 'two']
        );

        return view('pages.services')->with($data);
    }

}
