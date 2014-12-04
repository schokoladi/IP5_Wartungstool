<?php

class MaintenanceController extends \BaseController {

    protected $maintenance;

    public function __construct(Maintenance $maintenance){
        $this->maintenance = $maintenance;
    }

    public function index() {
        $maintenance_pl = $this->maintenance->all();
        return View::make('maintenance.index')->withMaintenance_pl($maintenance_pl);
    }

    public function show($name) {
        $maintenance = $this->maintenance->whereName($name)->first();
        return View::make('maintenance.show', ['maintenance' => $maintenance]);
    }

    public function create() {
        if(Input::get('Kunden_ID')) $customer_id = Input::get('Kunden_ID');
        else $customer_id = 0;

        $customer_options   = DB::table('Kunden')->orderBy('ID', 'asc')->lists('Name', 'ID');
        $contact_options    = DB::table('Kontaktpersonen')->where('Kunden_ID', $customer_id)->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('maintenance.create', [
            'customer_id'       => $customer_id,
            'customer_options'  => $customer_options,
            'contact_options'   => $contact_options
        ]);
    }

    public function store(){

        //dd(Input::all());
        $customer_id        = Input::get('Kunden_ID');
        return Redirect::route('maintenance.create', ['Kunden_ID' => $customer_id]);
        /*
        if(!$this->maintenance->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->maintenance->errors);
        }
        // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
        // Werte müssen nochmals in das Objekt gespeichert werden
        else {
            $this->maintenance->Vertragsnummer      = Input::get('Vertragsnummer');
            $this->maintenance->Titel               = Input::get('Titel');
            $this->maintenance->Beschreibung        = Input::get('Beschreibung');
            $this->maintenance->Status              = TRUE;
            $this->maintenance->Kunden_ID           = Input::get('Kunden_ID');
            $this->maintenance->Kontaktpersonen_ID  = Input::get('Kontaktpersonen_ID');
            $this->maintenance->save();

            return Redirect::route('maintenancearticles.create');
        }*/

    }

}
