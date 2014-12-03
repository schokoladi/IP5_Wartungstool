<?php

class CustomersController extends \BaseController {

    protected $customer;

    public function __construct(Customer $customer){
        $this->customer = $customer;
    }

    public function index() {
        $customers = $this->customer->all();
        return View::make('customers.index')->withCustomers($customers);
    }


}