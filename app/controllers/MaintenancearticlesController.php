<?php

class MaintenancearticlesController extends \BaseController {

    protected $maintenancearticle;

    public function __construct(Maintenancearticle $maintenancearticle){
        $this->maintenancearticle = $maintenancearticle;
    }

    public function index() {
        $maintenancearticles = $this->maintenancearticles->all();
        return View::make('maintenancearticles.index')->withMaintenancearticles($maintenancearticles);
    }

    public function show($title) {
        $maintenancearticles = $this->maintenancearticles->whereTitel($title)->first();
        return View::make('maintenancearticles.show', ['maintenancearticles' => $maintenancearticles]);
    }

    public function create() {
        $maintenance_id         = Input::get('maintenance_id');
        $manufacturer_id        = Input::get('manufacturer_id');
        $article_id             = Input::get('article_id');

        $maintenance_options    = DB::table('Wartungsvertraege')->orderBy('Titel', 'asc')->lists('Titel', 'ID');
        $manufacturer_options   = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->lists('Name','ID');

        if(empty($manufacturer_id)) {
            $manufacturer       = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->first();
            $manufacturer_id    = $manufacturer->ID;
        }
        // Alle Artikel des gegebenen Herstellers suchen
        $article_options        = DB::table('Artikel')->where('Artikelhersteller_ID', $manufacturer_id)->orderBy('Name', 'asc')->lists('Name','ID');
        // Den übergebenen Artikel Suchen
        $article_name            = DB::table('Artikel')->where('ID', $article_id)->pluck('Name');
        $article_check          = FALSE;
        // Kontrollieren, ob der übergeben Artikel überhaupt dum übergebenen Hersteller gehört
        if(!empty($article_options) && !empty($article_name)) {
            foreach($article_options as $option) {
                if ($option == $article_name) {
                    $article_check = TRUE;
                }
            }
        }

        if($article_check == FALSE) $article_id = '';

        if(empty($article_id)){
            $article            = DB::table('Artikel')->where('Artikelhersteller_ID', $manufacturer_id)->orderBy('Name', 'asc')->first();
            if(!empty($article)){
                $article_id     = $article->ID;
            }
            else{
                $article_id     = 0;
            }
        }
        $warranty_options = DB::table('Wartungsartikelhersteller')->where('Artikel_ID', $article_id)->orderBy('Dauer', 'asc')->lists('Name','ID');

        return View::make('maintenancearticles.create', [
            'maintenance_id'        => $maintenance_id,
            'manufacturer_id'       => $manufacturer_id,
            'article_id'            => $article_id,
            'maintenance_options'   => $maintenance_options,
            'manufacturer_options'  => $manufacturer_options,
            'article_options'       => $article_options,
            'warranty_options'      => $warranty_options
        ]);
    }

    public function store(){

        if(!Input::get('store')){
            $maintenance_id         = Input::get('Wartungsvertraege_ID');
            $manufacturer_id        = Input::get('Artikelhersteller_ID');
            $article_id             = Input::get('Artikel_ID');
            return Redirect::route('maintenancearticles.create', [
                'maintenance_id'    => $maintenance_id,
                'manufacturer_id'   => $manufacturer_id,
                'article_id'        => $article_id
            ])->withInput();
        }

        else {
            if (!$this->maintenancearticle->fill(Input::all())->isValid()) {
                return Redirect::back()->withInput()->withErrors($this->maintenancearticle->errors);
            }
            // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
            // Werte müssen nochmals in das Objekt gespeichert werden
            else {
                $this->maintenancearticle->Titel                        = Input::get('Titel');
                $this->maintenancearticle->Seriennummer                 = Input::get('Seriennummer');
                $this->maintenancearticle->Beschreibung                 = Input::get('Beschreibung');
                //$this->maintenancearticle->Kaufdatum                    = date()
                $this->maintenancearticle->Verrechnet                   = FALSE;
                $this->maintenancearticle->Wartungsvertraege_ID         = Input::get('Wartungsvertraege_ID');
                $this->maintenancearticle->Wartungsartikelhersteller_ID = Input::get('Wartungsartikelhersteller_ID');
                $this->maintenancearticle->Artikel_ID                   = Input::get('Artikel_ID');

                //dd($this->maintenancearticle);
                $this->maintenancearticle->save();

                $maintenance_id = DB::table('Wartungsvertraege')->where('ID', Input::get('Wartungsvertraege_ID'))->pluck('ID');
                return Redirect::route('maintenancearticles.create',  ['maintenance_id' => $maintenance_id]);
            }
        }

    }

}
