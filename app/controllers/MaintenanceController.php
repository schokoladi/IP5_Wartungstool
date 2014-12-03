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
        $customer_options   = DB::table('Kunden')->orderBy('Name', 'asc')->lists('Name','ID');
        $contact_options    = DB::table('Kontaktpersonen')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('maintenance.create', array(
            'customer_options'  => $customer_options,
            'contact_options'   => $contact_options
        ));
    }

    public function store(){

        //dd(Input::all());

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
        }

    }

}
