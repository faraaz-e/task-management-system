<?php include_once('admin_header.php'); ?>

      
<div class="container">


<div class="row">
  <div class="col-lg-2">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
      <div class="card-header text-white"><center>Total Tasks</center></div>
      <div class="card-body">
        <h5 class="card-title"><center><h4><?= $this->db->count_all_results('articles') ?></h4></center></h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>  


  <div class="col-lg-2">
      <div class="card text-dark bg-danger mb-3" style="max-width: 20rem;">
        <div class="card-header text-dark"><center>Tasks Pending</center></div>
        <div class="card-body">
          <h5 class="card-title"><center><h4>

            <?=     $this->db
                               ->where('status', NULL)
                               ->count_all_results('articles');
            ?>
              
            </h4></center></h5>
          <p class="card-text"></p>
        </div>
      </div>
  </div>

  <div class="col-lg-2">
      <div class="card text-dark bg-warning mb-3" style="max-width: 20rem;">
        <div class="card-header text-dark"><center>Tasks In-Progress</center></div>
        <div class="card-body">
          <h5 class="card-title"><center><h4>
            
            <?=     $this->db
                               ->where('status', 'In-Progress')
                               ->count_all_results('articles');
            ?>

          </h4></center></h5>
          <p class="card-text"></p>
        </div>
      </div>
  </div>

  <div class="col-lg-2">
      <div class="card text-dark bg-success mb-3" style="max-width: 20rem;">
        <div class="card-header text-dark"><center>Tasks Complete</center></div>
        <div class="card-body">
          <h5 class="card-title"><center><h4>
            <?=     $this->db
                               ->where('status', 'Complete')
                               ->count_all_results('articles');
            ?>
          </h4></center></h5>
          <p class="card-text"></p>
        </div>
      </div>
  </div>

</div>



<h2><center>Task List &nbsp<i class="fa fa-file-text-o" aria-hidden="true"></i></center></h2><br/>
<div class="jumbotron bg-light">

	<?php if( $feedback = $this->session->flashdata('feedback')): 
			$feedback_class = $this->session->flashdata('feedback_class');
		?>
    
    <div class="row">
    <div class="col-lg-6 col-lg-offset-3">

      <div class="alert alert-dismissible <?= $feedback_class ?>">
 
        <h4 class="alert-heading"></h4>
        <p class="mb-0"> <?= $feedback ?> </p>
      </div>

    </div>
    </div>

   <?php endif; ?>




   <div class="row">
    <div class="col-lg-6">
    		<a href=" <?= base_url('admin/store_article') ?> "><button type="button" class="btn btn-sm btn-info">Add</button></a>
    </div>
   </div><br/>


<table class="table table-hover">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">Sr.No</th>
      <th scope='col'>Type</th>
      <th scope="col">Title</th>
      <th scope="col">Assigned</th>
      <th scope="col">Published</th>
      <th scope="col">Deadline</th>
      <th scope="col">Position</th>      
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	<?php if( count($articles) ): 
  		$count = $this->uri->segment(3, 0);
  	 foreach( $articles as $article ): ?>
  	
   <!-- In the above lines " colons : " are used instead of " curly braces {} ", for having visiblity of Start and end of code --> 

    <tr class="table-default">
      <td> <?= ++$count ?></td>
      <td> <?= ucfirst($article->type) ?> </td>

      <td>
      	<?= anchor("admin/article/{$article->id}",ucfirst($article->title)) ?>
      </td>
      <td>
      	<?= ucfirst($article->pname) ?>
      </td>
      

      <td><?= date('d-m-Y', strtotime($article->created_at) ) ?></td> 
          
      <td><?= date('d-m-Y', strtotime($article->enddate) ) ?></td>


      <td>
            <?php if( (($article->enddate) < date("Y-m-d"))  &&  ( ($article->status) == 'In-Progress' || ($article->status) == NULL )) : ?>  
            <span class="text-warning"> Due </span>

            <?php elseif( (($article->enddate) < date("Y-m-d")) && (($article->enddate) < ($article->submitted_at)) ) : ?>
            <span class="text-warning"> Due </span>

            <?php else: ?>
            <span class="text-success"> On-Time </span>
          <?php endif; ?>
            
      </td>



      <td>

            <?php if( is_null ( $article->status) ) : ?>  
            <span class="text-danger"> Pending </span>
            <?php elseif( ($article->status) == 'In-Progress' ): ?>
            <span class="text-warning"> <?= $article->status ?> </span>
            <?php else: ?>
            <span class="text-success"> <?= $article->status ?> </span>
            <?php endif; ?>  

      </td>


      <td>

<!-- 
			 <div class="row">
			 <div class="col-lg-2">

			      		<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-sm btn-warning']); ?>
   
			      </div> -->

    <div class="row">
       <div class="col-lg-2">
            <?php if( is_null ( $article->status) ) : ?>
            <?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-sm btn-warning']); ?>
            <?php elseif( ($article->status) == 'In-Progress' ): ?> 
            <?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-sm btn-warning']); ?>
            <?php else: ?> 
            
            <?php endif; ?>  
			
    </div>

            &nbsp &nbsp


	      	 
	      	 <div class="col-lg-2">

	      	  <?= 
	      	  form_open("admin/delete_article"),
	      	  form_hidden('article_id', $article->id),
	      	  form_submit(['name'=>'submit','value'=>'Delete', 'class'=>'btn btn-sm btn-danger']),
	      	  form_close();
	      	  ?>

          </div>

	      	
	      </div>

      	      <!-- <button type="button" class="btn btn-danger">Delete</button> -->
      
      </td>
  




  </tr>




    <?php endforeach; ?>
    <?php else: ?>


    	<tr>
    		<td colspan="3">No Records Found</td>
    	</tr>

    <?php endif; ?>
    <!-- the above lines are ending of the code, used instead of curly braces as stated above -->

  </tbody>
</table> 


<?= $this->pagination->create_links(); ?>



<!-- <div>
  <ul class="pagination">
  	<li class="page-item">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</div> -->




</div>

<?php include_once('admin_footer.php'); ?>
