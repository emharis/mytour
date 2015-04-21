<?php

namespace App\Controllers\Admin;

class RentalController extends \BaseController {
	
	private $rental_img_path;

    function __construct() {
        $aPath = \DB::table('constval')->where('name', '=', 'rental_img_path')->first();
        $this->rental_img_path = $aPath->value;
    }

    function getIndex() {
        return \View::make('back.paket.rental.rental', array(
        		'rentals' => \DB::table('rental')->get()
        ));
    }
    
	/**
	 * edit data rental
	 */
    function getEdit($id){
    	$rental = \DB::table('view_rental')->find($id);
    	
    	return \View::make('back.paket.rental.edit', array(
        		'rental' => $rental,
        		'img_path' => $this->rental_img_path
        ));	
 	 }

}
