<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model{
		
		public $DB = array();
		
		public function __construct(){
			$this->load->database('test');
		}
		
		public function getLogInfo($email,$pswd){
			
			$query = $this->db->query("SELECT uid,email FROM users WHERE (email = '" . mysql_real_escape_string(trim($email)) . "') and (password  = '" . mysql_real_escape_string(trim($pswd)) . "') and status='1'");
			
			$result['user'] = 0;
			foreach ($query->result() as $row)
			{
				$result['uid'] = $row->uid;
				$result['email'] = $row->email;
				$result['user'] = 1;
			}

			return $result;
		}
	
	
	}


?>
