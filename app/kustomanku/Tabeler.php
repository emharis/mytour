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
class Tabeler {

     protected $table = null;
    protected $header = null;
    protected $attr = null;
    protected $data = null;

    public function __construct($data = null, $attr = null, $header = null)
    {
        if(is_null($data)) return;
        $this->data = $data;
        $this->attr = $attr;
        if(is_array($header)) {
            $this->header = $header;
        }
        else {
            if(count($this->data) && $this->is_assoc($this->data[0]) || is_object($this->data[0])) {
                $headerKeys = is_object($this->data[0]) ? array_keys((array)$this->data[0]) : array_keys($this->data[0]);
                $this->header = array();
                foreach ($headerKeys as $value) {
                    $this->header[] = $value;
                }
            }
        }
        return $this;
    }
    
    public static function CreateTable($data,$attr,$header){
		return new Tabeler($data,$attr,$header);
	}

    public function build()
    {
        $atts = '';
        if(!is_null($this->attr)) {
            foreach ($this->attr as $key => $value) {
                $atts .= $key . ' = "' . $value . '" ';
            }
        }
        $table = '<table ' . $atts . ' >';

        if(!is_null($this->header)) {
            $table .= '<thead><tr>';
            foreach ($this->header as $value) {
                $table .= '<th>' . ucfirst($value) . '</th>';
            }
            $table .= '</thead></tr>';
        }

        $table .= '<tbody>';
        foreach ($this->data as $value) {
            $table .= $this->createRow($value);
        }
        $table .= '</tbody>';
        $table .= '</table>';
        return $this->table = $table;
    }

    protected function createRow($array = null)
    {
        if(is_null($array)) return false;
            $row = '<tr>';
            foreach ($array as $value) {
                $row .= '<td>' . $value . '</td>';
            }
            $row .= '</tr>';
            return $row;
    }

    protected function is_assoc($array){
        return is_array($array) && array_diff_key($array, array_keys(array_keys($array)));
    }

}
