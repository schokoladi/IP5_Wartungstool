<?php

class CurrenciesController extends \BaseController {

    protected $currency;

    public function __construct(Currency $currency){
        $this->currency = $currency;
    }
    public function create() {
        $currencies_options = DB::table('Waehrungen')->orderBy('Waehrung', 'asc')->lists('Waehrung','ID');
        return View::make('articles.create', array('currency_options' => $currencies_options));
    }

}