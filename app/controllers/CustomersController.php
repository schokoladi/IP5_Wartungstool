<?php

class CustomerController extends \BaseController {

    protected $customer;

    public function __construct(Customer $customer){
        $this->customer = $customer;
    }

    public function show() {
        $customers = $this->customer->all();
        return View::make('customers.show')->withKunden($customers);
    }

}