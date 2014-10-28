<?php

class PagesController extends HomeController {
    
    public function home() {
        $name = 'Dominik';
        return View::make('hello')->with('name', $name);
    }
    
    public function about() {
        return View::make('about');
    }
    
}

?>