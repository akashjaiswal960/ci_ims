<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
		
		class Login extends CI_Controller {
			
			public function __construct(){				
				parent::__construct();
				$this->load->library('session');
			}
			
			function index(){
				$this->load->helper('url');
				$this->load->view("login_view");
				$this->signin();
			} 
			
			public function signin(){				
				
				$this->load->model("login_model",'model');				
				if(isset($_POST) && !empty($_POST)){
					$name = isset($_POST['username']) ? $_POST['username'] : "";
					$pswd = isset($_POST['password']) ? $_POST['password'] : "";				
					$profile = $this->model->getLogInfo($name,$pswd);
					$this->session->set_userdata($profile);
					$profile_data = urlencode(serialize($profile));
					if($profile['user'] == 1){
						redirect('/globalreport/getGlobalReport/');
					}else{
						redirect('/login/');
					}
				}
			}
			
			public function signout(){
				$this->session->sess_destroy();
				redirect('/login/');
			}
			
		}

?>
