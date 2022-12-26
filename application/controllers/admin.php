<?php
class Admin extends MY_Controller{
	
	public function dashboard() 
	{

		$this->load->library('pagination');

		$config = [
			'base_url'  => base_url('admin/dashboard'),
			'per_page'  => 5,
			'total_rows' => $this->articles->num_rows(),

			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => '</ul>',

			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',

			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',

			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',

			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',

			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>',

			'cur_tag_open' => '<li class="page-item active bg-dark text-white"><a>',
			'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);
		$this->load->helper('url');
		$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );
		$this->load->view('admin/dashboard', ['articles'=>$articles]);
	}


	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required');
		if( ! $this->form_validation->run() )
			return $this->dashboard();

		$query = $this->input->post('query');

		return redirect ("admin/search_results/$query");
	}

	
	public function search_results( $query )
	{

		$this->load->helper('form');
   		$this->load->model('articlesmodel','articles');
   		$this->load->library('pagination');
		$config = [
			'base_url'  => base_url("admin/search_results/$query"),
			'per_page'  => 5,
			'total_rows' => $this->articles->count_search_results( $query ),

			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => '</ul>',

			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',

			'uri_segment'  => 4,


			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',

			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',

			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',

			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>',

			'cur_tag_open' => '<li class="page-item active bg-dark text-white"><a>',
			'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);
		$articles = $this->articles->search( $query, $config['per_page'], $this->uri->segment(4) );
		$this->load->view('admin/dashboard_search_results',compact('articles') );
	}

	public function add_article()
	{
	   $this->load->helper('form'); 
	   $this->load->helper('date');
	   $this->load->view('admin/add_article');	
	}

	public function store_article()
	{	
		$config = [
					'upload_path' => './uploads',
					'allowed_types' => 'jpg|jpeg|png|zip|rar|txt|pdf|xlsx|docx|ppt|pages',
		];
		$this->load->library('upload', $config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		
		if( $this->form_validation->run('add_article_rules') ){

			$post = $this->input->post();
			unset($post['submit']);
			return $this->_flashAndRedirect(
					$this->articles->add_article($post),
					 "Task added Successfully",
					 "Task failed to add. Please try again."
			);
		}
		else{
			$this->load->view('admin/add_article');
		}
	}



	public function edit_article($article_id)
	   {
	   	$article = $this->articles->find_article($article_id);
	   	$this->load->view('admin/edit_article', ['article'=>$article]);
	   }


	 public function update_article($article_id)
	 {
	 	
	 	$config = [
					'upload_path' => './uploads',
					'allowed_types' => 'jpg|jpeg|png|zip|rar|txt|pdf|xlsx|docx|ppt|pages',
		];
		$this->load->library('upload', $config);
	 	$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if( $this->form_validation->run('add_article_rules') ){

				$post = $this->input->post();
				unset($post['submit']);
				return $this->_flashAndRedirect(
						$this->articles->update_article($article_id, $post),
						"Task Updated Successfully.",
						"Task failed to update. Please try again."
				);

		} else {
			$this->load->view('admin/edit_article');	
		}
	}




	

	public function delete_article()
	{
		
		$article_id = $this->input->post('article_id');

		return $this->_flashAndRedirect(
			$this->articles->delete_article($article_id),
			"Task Deleted Successfully.",
			"Task failed to delete, Please try again."
		 );

	}


	public function article( $id )
		{
			$this->load->helper('form');
			$this->load->model('articlesmodel', 'articles');
			$article = $this->articles->find( $id );
			$this->load->view('admin/admin_article_detail', compact('article') );

		}





	public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_id') )
			return redirect('login');

		$this->load->model('articlesmodel','articles');
	}


	private function _flashAndRedirect( $successful, $successMessage, $failureMessage )
	{
		if ( $successful ){
			$this->session->set_flashdata('feedback', $successMessage);
			$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect('admin/dashboard');
	}


}
