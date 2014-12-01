<?php

class PagesController extends HomeController {
    
    public function home() {
        $name = 'Dominik';
        return View::make('HALLO');
        //return View::make('hello')->with('name', $name);
    }
    
    public function about() {
        return View::make('about');
    }

    public function create() {
        return View::make('createtest');
    }
    
}

?>