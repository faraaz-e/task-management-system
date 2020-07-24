<?php
class Login extends MY_Controller{
	public function index()
	{

		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
	   // The above two lines checks, if the user is logged in, then it redirects to dashboard

		$this->load->helper(array('url','form'));
		$this->load->view('public/admin_login');
    }
		public function admin_login()
		{
			$this->load->library('form_validation');
			$this->load->helper('url');
			// $this->form_validation->set_rules('username','Username','required|alpha|trim');
			// $this->form_validation->set_rules('password','Password','required');	
			
            // The above two lines is commented because we have set the rules in config > form_validation.php

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if( $this->form_validation->run('admin_login') ){

			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->load->model('loginmodel');
		    // The above line loads the model i.e the database part, and the below line will check the credentails entered.
			$login_id = $this->loginmodel->login_valid($username, $password);
			if( $login_id )
			{
				$this->load->library('session');
				$this->session->set_userdata( 'user_id',$login_id ); 
				return redirect('admin/dashboard');
				// The above line is redirecting to dashboard, because it if we write $this->load->view('admin/dashboard'), then it may ruin the logic, as the url will be like "tms/index.php/login/admin_login", hence we keep login.php to function as Backend only for login. The view will be loaded in Admin Controller. 
			}
				else{

					$this->session->set_flashdata('login_failed','Invalid Username/Password.'); 
					return redirect('login');
					//echo "Credentials did not match";	
					//Credentails Failed
				}

		  } 	 
			else{
				$this->load->view('public/admin_login');
			}
			
		}	


		public function logout()
		{
			$this->session->unset_userdata( 'user_id' );
			return redirect('login');
		}


	}