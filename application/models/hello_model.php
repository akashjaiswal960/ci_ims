<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Hello_model extends CI_Model{
	
		public function getProfile($name){
			
			$val['fname'] = $name;
			$val['lname'] = "Jaiswal";
			$val['age']   = '25';
			return $val;
		}
	
	
	}


?>
