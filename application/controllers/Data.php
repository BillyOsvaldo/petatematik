<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function geoJSON() {

        $data = [];
        $items = $this->summary->all();
        for($i = 0; $i < count($items); $i++) {
            $properties = $this->summary->find(md5($items[$i]->id));
            $coordinate = json_decode($this->subdistrict->find(md5($items[$i]->id))->coordinates);
            $data[$i] = $this->_geoJSON($properties, $coordinate);
        }
		

		echo json_encode($data);
	}

	private function _geoJSON($properties, $coordinate) {
		return array(
			"type" => "GeometryCollection",
			"properties" => $properties,
			"geometries" => array(
				0 => array(
					"type" => "MultiPolygon",
					"coordinates" => $coordinate
				)
			)
		);
	}
}
