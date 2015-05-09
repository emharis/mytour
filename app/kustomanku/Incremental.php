<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helpers
 *
 * @author Eries
 */
class Incremental {

    public static function getIncrementValue(){
        $currentVal = DB::table('constval')->where('name','=','inc_val')->first();
        //update value
        DB::table('constval')->where('name','=','inc_val')->update(array('value'=>$currentVal->value + 1));
        return $currentVal->value+1;
    }

}
