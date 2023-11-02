<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location_model
 *
 * @author Muhammad Ansari
 */

// if (!defined('BASEPATH'))     exit('No direct script access allowed');

namespace App\Models;
use CodeIgniter\Model;

class Location_model extends Model {
    //put your code here
    

    private $_countryID;
    private $_stateID;
 
    function __construct() {
        parent::__construct();
    }
    // set country id
    public function setCountryID($countryID) {
        return $this->_countryID = $countryID;
    }
    // set state id
    public function setStateID($stateID) {
        return $this->_stateID = $stateID;
    }
 
    public function getAllCountries() {	
        $query=$this->db->table('country as c')->select('c.id as country_id,  c.code, c.name as country_name')->get();
        return $query->getResultArray();
    }
 
    // get state method
    public function getStates() {
        $query = $this->db->table('state as s')->select(array('s.id as state_id', 's.country_id', 's.name as state_name'))
                            ->where('s.country_id', $this->_countryID)->get();
        return $query->getResultArray();
    }
 
    // get city method
    public function getCities() {
        $query = $this->db->table('city as i')->select(array('i.id as city_id', 'i.name as city_name','i.id_type', 'i.state_id'))
                    ->where('i.type_id', '1')
                    ->where('i.state_id', $this->_stateID)
                    ->get();
        return $query->getResultArray();
    }
}
