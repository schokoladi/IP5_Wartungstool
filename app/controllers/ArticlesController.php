<?php

class ArticlesController extends \BaseController {

    protected $article;

    public function __construct(Article $article){
        $this->article = $article;
    }

    public function index() {
        $articles = $this->article->all();
        return View::make('articles.index')->withArticles($articles);
    }

    public function show($name) {
        $article = $this->article->whereName($name)->first();
        return View::make('articles.show', ['articles' => $article]);
    }

    public function create() {
        $manufacturer_options = DB::table('Artikelhersteller')->orderBy('Name', 'asc')->lists('Name','ID');
        return View::make('articles.create', array('manufacturer_options' => $manufacturer_options));
    }

    public function store(){

        //dd(Input::all()); // ok

        //$this->articles = Input::all();
        $this->article->Artikelnummer           = Input::get('Artikelnummer');
        $this->article->Name                    = Input::get('Name');
        $this->article->Beschreibung            = Input::get('Beschreibung');
        $this->article->Einkaufspreis           = Input::get('Einkaufspreis');
        $this->article->Verkaufspreis           = Input::get('Verkaufspreis');
        $this->article->Artikelhersteller_ID    = Input::get('Artikelhersteller_ID');
        /*if(!$this->user->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }*/
        $this->article->save();

        return Redirect::route('warranties.create');

    }

}
