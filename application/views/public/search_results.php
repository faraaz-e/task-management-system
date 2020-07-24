	<?php include('public_header.php');?>

	<div class="container"><br/>

		<h2><center>Search Results :</center></h2>
		<br/>
<div class="jumbotron bg-light">
		<table class="table table-hover">
  <thead>
    <tr class="table-default bg-dark text-white">
      <th scope="col">Sr.No</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>
      <th scope="col">Assigned</th>
      <th scope="col">Published</th>
      <th scope="col">Deadline</th>
      <th scope="col">Position</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-default">
      <?php if( count($articles) ): ?>
      <?php $count = $this->uri->segment(4, 0); ?>
      <?php foreach( $articles as $article ): ?> 

      <td><?= ++$count ?></td>
      <td><?= ucfirst($article->type) ?></td>
      <!-- <td><?= $article->title ?></td> -->
      <td><?= anchor("user/article/{$article->id}",ucfirst($article->title)) ?></td>
      <td><?= ucfirst($article->pname) ?></td>
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



    </tr>
    
     <?php endforeach; ?>
    <?php else: ?>

          <tr class="table-default">
            <td colspan="3"> No Records Found. </td>
          </tr>
    <?php endif; ?>
  </tbody>
</table><br/>

<?= $this->pagination->create_links(); ?>

</div>


	<?php include('public_footer.php');?>