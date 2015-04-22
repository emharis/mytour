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
class Helpers {

    public static function dataToSelectArray($model, $id, $value, $raw = '') {
        if ($raw == '') {
            $rows = $model::all();
        } else {
            $rows = $model::raw($raw)->get();
        }

        $data = array();
        foreach ($rows as $row) {
            $data[$row->$id] = $row->$value;
        }

        return $data;
    }

    public static function currencyTo($from, $to) {
//        $from = 'JPY';
//        $to = 'IDR';

        
        try {
            $url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s=' . $from . $to . '=X';
            $handle = fopen($url, 'r');

            if ($handle) {
                $result = fgetcsv($handle);
                fclose($handle);
            }
            
            return $result[0];
        } catch (Exception $ex) {
            return 1;
        }


        //echo '1 ' . $from . ' is worth ' . $result[0] . ' ' . $to . ' Based on data on ' . $result[1] . ' ' . $result[2];

        
    }

}
