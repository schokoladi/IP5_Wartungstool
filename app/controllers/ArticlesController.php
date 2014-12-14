<?php

class ArticlesController extends \BaseController {

    protected $article;

    public function __construct(Article $article){
        $this->article = $article;
    }

    public function index() {
        //$articles = $this->article->all();
        //return View::make('articles.index')->withArticles($articles);

        $articles = DB::table('Artikel')
            ->select('Artikel.Artikelnummer', 'Artikel.Name')
            ->get();
        return View::make('articles.index')->withArticles($articles);
    }

    public function show($name) {
        $article = $this->article->whereName($name)->first();
        return View::make('articles.show', ['articles' => $article]);
    }

    public function create() {
        $manufacturer_options   = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->lists('Name','ID');
        $currency_options       = DB::table('Waehrungen')->orderBy('ID', 'asc')->lists('Waehrung', 'ID');
        return View::make('articles.create', [
            'manufacturer_options'  => $manufacturer_options,
            'currency_options'      => $currency_options
        ]);
    }

    public function store(){

        //dd(Input::all());

        if(!$this->article->fill(Input::all())->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->article->errors);
        }
        // Es tritt ein Fehler auf, wenn nur save() aufgerufen wird.
        // Werte müssen nochmals in das Objekt gespeichert werden
        else {
            $this->article->Artikelnummer           = Input::get('Artikelnummer');
            $this->article->Name                    = Input::get('Name');
            $this->article->Beschreibung            = Input::get('Beschreibung');
            $this->article->Einkaufspreis           = Input::get('Einkaufspreis');
            $this->article->EK_Waehrungen_ID        = Input::get('EK_Waehrungen_ID');
            $this->article->Verkaufspreis           = Input::get('Verkaufspreis');
            $this->article->VK_Waehrungen_ID        = Input::get('VK_Waehrungen_ID');
            $this->article->Artikelhersteller_ID    = Input::get('Artikelhersteller_ID');
            $this->article->save();

            return Redirect::route('warranties.create');
        }

    }

}
