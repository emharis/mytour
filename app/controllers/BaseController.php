<?php

class BaseController extends Controller {

    function __construct() {
        $constvalobj = DB::table('constval')->select('name', 'value')->get();
//                echo var_dump($constval);
        $constval = array();
        foreach ($constvalobj as $dt) {
            $constval[$dt->name] = $dt->value;
        }
        View::share('constval', $constval);
        
        //latest post
        $lastpost = \DB::table('view_blogs')->orderBy('created_at','desc')->limit(5)->get();
        View::share('lastposts',$lastpost);
        
        //random footer gallery
        $randgals = \DB::table('gallery')->orderByRaw('rand()')->limit(12)->get();
        View::share('randgals',$randgals);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {

        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
//        if (Request::is('front*')) {
//            View::composer('front.partials.master', function($view) {
//                //declare select currency
//                /*$currencies = App\Models\Currency::all();
//                $selectCurrency=array();
//                foreach($currencies as $crn){
//                    $selectCurrency[$crn->id] = $crn->symbol . ' ' . $crn->nama;
//                }
//                
//                $view->with('comp', \App\Models\Company::first());
//                $view->with('topmenu', App\Models\Menu::orderBy('position_order')->whereRaw('position in (1,3)')->where('parent_id',0)->where('publish', 'Y')->get());
//                $view->with('bottommenu', App\Models\Menu::orderBy('position_order')->whereRaw('position in (2,3)')->where('publish', 'Y')->get());
//                $view->with('footerblogcount', App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'footer_blog_count')->first()->value)->get());
//                $view->with('complogo', \App\Models\Konfig::where('nama', 'comp_logo')->first()->value);
//                $view->with('compslogan', \App\Models\Konfig::where('nama', 'comp_slogan')->first()->value);
//                $view->with('homepage', \App\Models\Homepage::first());
//                $view->with('selectCurrency', $selectCurrency);*/
//                
//                //generate menu
//                $menus = DB::table('menu')->where('parent_id',0)->where('publish','Y')->orderBy('order')->get();
//                $view->with('menus', $menus);
//                
//                $constvalobj = DB::table('constval')->select('name','value')->get();
////                echo var_dump($constval);
//                $constval = array();
//                foreach($constvalobj as $dt){
//                    $constval[$dt->name] = $dt->value;
//                }
//                $view->with('constval', $constval);
//                
//            });
//        }
        //sett default currency
        //if(!Session::has('defcurrency')){
//             \Session::put('defcurrency', App\Models\Currency::find(\DB::table('config')->where('nama','default_currency')->first()->value)->toArray());
        //}

        View::composer('*', function($view) {
            //generate menu
            $menusobj = DB::table('menu')->where('parent_id', 0)->where('publish', 'Y')->orderBy('order')->get();
            $menus = array();
            $idx = 0;
            foreach ($menusobj as $mn) {
                $menus[$idx]['id'] = $mn->id;
                $menus[$idx]['nama'] = $mn->nama;
                $menus[$idx]['position'] = $mn->position;
                $menus[$idx]['link'] = $mn->link;
                
                //cek punya downline gak
                $childs = DB::table('menu')->where('parent_id', $mn->id)->get();
                if (count($childs) > 0) {
                    $menus[$idx]['childs'] = $childs;
                }
                //increment index
                $idx++;
            }
            $view->with('menus', $menus);
        });
    }

}
