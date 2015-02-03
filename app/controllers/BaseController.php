<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
        if (Request::is('front*')) {
            View::composer('front.partials.master', function($view) {
                $view->with('comp', \App\Models\Company::first());
                $view->with('topmenu', App\Models\Menu::orderBy('position_order')->whereRaw('position in (1,3)')->where('publish', 'Y')->get());
                $view->with('bottommenu', App\Models\Menu::orderBy('position_order')->whereRaw('position in (2,3)')->where('publish', 'Y')->get());
                $view->with('footerblogcount', App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'footer_blog_count')->first()->value)->get());
                $view->with('complogo', \App\Models\Konfig::where('nama', 'comp_logo')->first()->value);
                $view->with('compslogan', \App\Models\Konfig::where('nama', 'comp_slogan')->first()->value);
                $view->with('homepage', \App\Models\Homepage::first());
            });
        }
    }

}
