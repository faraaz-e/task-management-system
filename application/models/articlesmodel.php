<?php

class Articlesmodel extends CI_Model {

	public function articles_list( $limit, $offset )
	{
      $user_id = $this->session->userdata('user_id');
      $query = $this->db
      					   ->select(['type','title', 'pname', 'body','id','status','created_at', 'submitted_at', 'enddate'])
      					   ->from('articles')
      					   ->where('user_id', $user_id)
      					   ->order_by('created_at','DESC')
      					   ->limit ($limit, $offset )
      					   ->get();
      			return $query->result();
	}


	public function all_articles_list( $limit, $offset )
	{
      $query = $this->db
      					   ->select(['type','title', 'pname', 'created_at','id','status', 'submitted_at', 'enddate'])
      					   ->from('articles')
      					   ->order_by('created_at','DESC')
      					   ->limit ($limit, $offset)
      					   ->get();
      			return $query->result();
	}



	public function count_all_articles()
	{
      $query = $this->db
      					   ->select(['title', 'pname', 'id'])
      					   ->from('articles')
      					   ->get();
      			return $query->num_rows();
	}

	public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');
      $query = $this->db
      					   ->select(['title', 'pname', 'id'])
      					   ->from('articles')
      					   ->where('user_id', $user_id)
      					   ->get();
      			return $query->num_rows();
	}

	public function add_article($array)
	{
		return $this->db->insert ( 'articles', $array );
	}

	public function find_article($article_id)
	{
		$q = $this->db->select(['id','type','title','body','pname','enddate'])
					  ->where('id', $article_id)
					  ->get('articles');
		     return $q -> row();
	}

	public function update_article($article_id, $article)
	{
		return $this->db->where('id',$article_id)
					  ->update('articles',$article);
	}


	public function delete_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}


	public function update_status($article_id)
	{
		 return $this->db->set('status', 'In-Progress')
					  ->where('id',$article_id)
					  ->update('articles');
	}

	public function complete_status($article_id)
	{
		 return $this->db->set('status', 'Complete')
					  ->where('id',$article_id)
					  ->update('articles');
	}

	public function search( $query, $limit, $offset )
	{
		$q = $this->db->from('articles')
				 	->like('title', $query)
				 	->or_like('pname', $query)
				 	->or_like('type', $query)
				 	->order_by('created_at','DESC')
				 	->limit( $limit, $offset)
					->get();

			return $q->result();
	}

	public function count_search_results( $query )
	{
		$q = $this->db->from('articles')
				 	->like('title', $query)
				 	->or_like('pname', $query)
				 	->or_like('type', $query)
					->get();

			return $q->num_rows();
	}


	public function find( $id )
	{
		$q = $this->db
				->from('articles')
				->where( ['id' => $id] )
				->get();
			if ( $q->num_rows() )
				return $q->row();
			return false;
	}

}
