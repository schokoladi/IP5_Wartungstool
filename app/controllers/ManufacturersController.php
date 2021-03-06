<?php

class ManufacturersController extends \BaseController {

    protected $manufacturer;

    public function __construct(Manufacturer $manufacturer){
        $this->manufacturer = $manufacturer;
    }

    public function index() {
        $manufacturers = $this->manufacturer->all();
        return View::make('manufacturers.index')->withManufacturers($manufacturers);
    }

    public function show($name) {
        $manufacturer = $this->manufacturer->whereName($name)->first();
        return View::make('manufacturers.show', ['manufacturer' => $manufacturer]);
    }

    public function create() {
        return View::make('manufacturers.create');
    }

    public function store(){

        //dd(Input::all()); // ok

        if(!$this->manufacturer->fill(Input::all())->isValid()) {
            return Redirect::back()->withErrors($this->manufacturer->errors);
        }
        $this->manufacturer->save();
        return Redirect::route('articles.create');

    }

}
