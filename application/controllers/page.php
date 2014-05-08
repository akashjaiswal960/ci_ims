<?php
class Page extends CI_Controller {
   
	
	function page_view (){
		$this->load->helper('url');
		$this->load->library('template');
		$this->template->add_js('html/js/jquery.js');
		$this->template->add_js('html/js/jqlayout/jquery.layout.js');
		$this->template->add_js('html/js/jqlayout/jquery.ui.all.js');
		$this->template->render();
		$this->load->view("one");
	}
    
}

?>
