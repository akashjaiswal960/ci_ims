<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
		
		class Globalreport extends CI_Controller {
			
			public function __construct(){				
				parent::__construct();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->library('template');
				$this->template->add_js('html/js/jquery.js');				
				$this->template->add_js('html/js/jquery-ui-1.10.4.js');
				$this->template->add_js('html/js/jqgrid/i18n/grid.locale-en.js');
				$this->template->add_js('html/js/jqgrid/jquery.jqGrid.min.js');
				$this->template->add_js('html/js/jqgrid/jqgridCommon.js');
				$this->template->add_js('html/js/menu.js');
				$this->template->add_js('html/js/jqlayout/jquery.layout.js');
				//$this->template->add_js('html/js/jqlayout/jquery.ui.all.js');
				$this->template->add_css('html/css/jqgrid/jquery-ui-custom.css');
				$this->template->add_css('html/css/jqgrid/ui.jqgrid.css');
				$this->template->add_css('html/css/common.css');
				$this->template->add_css('html/css/menu.css');
				$this->template->add_css('html/css/reports.css');
				$this->template->render();
			}
			
			public function getGlobalReport($params=""){
				$session_data = $this->session->all_userdata();
				$data['userdata'] = $session_data['email'];
				$data['sdate'] = "NULL";
				$data['edate'] = "NULL";
				$data['ispOptins'] = "ALL";
				$data['offerid'] = "NULL";
				if(isset($_POST['submitParams']) == 'Submit'){
				
					$data['sdate']			= isset($_POST['from']) ? $_POST['from'] : 'NULL';
					$data['edate']			= isset($_POST['to']) ? $_POST['to'] : 'NULL';
					$data['ispOptins'] 		= isset($_POST['ispOptins']) ? $_POST['ispOptins'] : 'ALL';
					$data['offerid'] 		= isset($_POST['offerid']) && !empty($_POST['offerid']) ? $_POST['offerid'] : 'ALL';
				}
				
				$this->load->view("global_view",$data);
				
			}	
			
		}

?>