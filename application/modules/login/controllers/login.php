<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")=="")
		{
			//load view login
 			$this->load->view($GLOBALS['site_theme']."/login/login");
		}
		else
		{
			//redirect ke controller dashboard
			redirect("dashboard");
		}
	}
	
	function act()
	{
		if($this->session->userdata("logged_in")=="")
		{
			//masukkan data ke array untuk di parsing ke model
 			$dt['username'] = $_POST['username'];
 			$dt['password'] = $_POST['password'];

 			//memanggil method cekUserLogin() pada model app_user_login_model
 			//memasukkan hasil inputan dari method POST form
			$this->app_user_login_model->cekUserLogin($dt);
		}
		else
		{
			//redirect ke controller dashboard
			redirect("dashboard");
		}
	}
}
