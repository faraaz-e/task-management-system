<?php
class User extends MY_Controller{
	public function index()
	{	   
	   $this->load->helper('form');
	   $this->load->model('articlesmodel','articles');
	   $this->load->library('pagination');
			$config = [
				'base_url'  => base_url('user/index'),
				'per_page'  => 5,
				'total_rows' => $this->articles->count_all_articles(),

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

			$articles = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));


		// $this->load->view('public/articles_list',compact('articles'));
		//We can also write above line instead of below line
		$this->load->view('public/articles_list',['articles'=>$articles]);

	}



		public function search()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('query','Query','required');
			if( ! $this->form_validation->run() )
				return $this->index();

			$query = $this->input->post('query');
			
			return redirect ("user/search_results/$query");
			// $this->load->model('articlesmodel', 'articles');
			// $articles = $this->articles->search($query);

			// $this->load->view('public/search_results',compact('articles') );

		}

		public function search_results( $query )
		{

		$this->load->helper('form');
	   $this->load->model('articlesmodel','articles');
	   $this->load->library('pagination');
			$config = [
				'base_url'  => base_url("user/search_results/$query"),
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

			$this->load->view('public/search_results',compact('articles') );

		}


		public function article( $id )
		{
			$this->load->helper('form');
			$this->load->model('articlesmodel', 'articles');
			$article = $this->articles->find( $id );
			$this->load->view('public/article_detail', compact('article') );

		}




	    public function update_status()
	    {
	   		
			$article_id = $this->input->post('article_id');
			$this->load->model('articlesmodel', 'articles');
			$this->articles->update_status($article_id);
			$data = $this->input->post();
			// return redirect('');
			
			$this->load->helper('url');
			$currentURL = base_url();
			return redirect ($currentURL);
	    }



	    public function complete_status()
	    {
	   		
			$article_id = $this->input->post('article_id');
			$this->load->model('articlesmodel', 'articles');
			$this->articles->complete_status($article_id);
			$data = $this->input->post();
			// return redirect('');

			$this->load->helper('url');
			$currentURL = base_url();
			return redirect ($currentURL);
		}




		 

		// public function file_download($article_id)
	 //    {
	   		
		// 	$this->load->helper('download');
		// 	$article_id = $this->input->post('article_id');
		// 	$this->load->model('articlesmodel', 'articles');
		// 	$this->articles->file_download($article_id);



			// $pth    =   file_get_contents("uploads/".$file_path);
			// $nme    =   $file_path	;
			// force_download($nme, $pth);  
			// force_download ('uploads/raw_name/file_ext');

			  // redirect(current_url(), "refresh");

			// $this->load->helper('url');
			// $currentURL = base_url();
			// return redirect ($currentURL);
	    // }



}
