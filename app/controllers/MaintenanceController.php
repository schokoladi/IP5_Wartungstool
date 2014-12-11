<?php

class MaintenanceController extends \BaseController {

    protected $maintenance;

    public function __construct(Maintenance $maintenance){
        $this->maintenance = $maintenance;
    }

    public function index() {
        $maintenance_collection = DB::table('Wartungsvertraege')
            ->join('Kunden', 'Kunden_ID', '=', 'Kunden.ID')
            ->join('Kontaktpersonen', 'Kontaktpersonen_ID', '=', 'Kontaktpersonen.ID')
            ->select('Wartungsvertraege.Vertragsnummer', 'Wartungsvertraege.Titel', 'Kunden.Name', 'Kontaktpersonen.Vorname')
            ->get();
        return View::make('maintenance.index')->withMaintenance_collection($maintenance_collection);
    }

    public function show($name) {
        $maintenance = $this->maintenance->whereName($name)->first();
        return View::make('maintenance.show', ['maintenance' => $maintenance]);
    }

    public function create() {
        $customer_id = Input::get('customer_id');
        if(empty($customer_id)) $customer_id = 0;
        $customer_options   = DB::table('Kunden')->orderBy('order', 'asc')->orderBy('Name', 'asc')->lists('Name', 'ID');
        $contact_options    = DB::table('Kontaktpersonen')->where('Kunden_ID', $customer_id)->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('maintenance.create', [
            'customer_id'       => $customer_id,
            'customer_options'  => $customer_options,
            'contact_options'   => $contact_options
        ]);
    }

    public function store()
    {

        if(!Input::get('store')){
            $customer_id    = Input::get('Kunden_ID');
            return Redirect::route('maintenance.create', [
                'customer_id' => $customer_id
            ])->withInput();
        }
        // würde wohl auch ohne else funktionieren
        else {

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

                $maintenance = DB::table('Wartungsvertraege')->orderBy('ID', 'desc')->first();

                return Redirect::route('maintenancearticles.create', ['maintenance_id' => $maintenance->ID]);
            }
        }

    }

}
