<?php

class PagesController extends HomeController {
    
    public function home() {
        return 'Hallo';
        //return View::make('hello')->with('name', $name);
    }
    
    public function about() {
        return View::make('about');
    }

    public function create() {
        return View::make('createtest');
    }

    public function edit() {
        return View::make('edittest');
    }

    public function show() {
        return View::make('showtest');
    }


    
}

?>