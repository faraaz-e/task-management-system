<?php include_once('admin_header.php'); ?>
<div class="container">
     

<h2><center>
	<?= ucfirst($article->title) ?>
</center>
</h2>

<div class="jumbotron bg-white border border">
<div class="row">

        	<div class="col-lg-2">

                <p><h5><b>Status :</b></h5> 
                		    
                		    <?php if( is_null ( $article->status) ) : ?>
                            <span class="text-danger"> <h5><b>Pending</b></h5></span>
                            <?php elseif( ($article->status) == 'In-Progress' ): ?> 
                            <span class="text-warning"> <h5><b><?= $article->status ?></b></h5></span>
                            <?php else: ?> 
                            <span class="text-success"> <h5><b><?= $article->status ?></b></h5></span>
                            <?php endif; ?>  
                <br/>
         </div>




        <div class="col-lg-2">

            <p><h5><b>Position :</b></h5> 

            <span>
                <?php if( (($article->enddate) < date("Y-m-d"))  &&  ( ($article->status) == 'In-Progress' || ($article->status) == NULL )) : ?>  
            <span class="text-warning"> <h5><b>Due</b></h5> </span>

            <?php elseif( (($article->enddate) < date("Y-m-d")) && (($article->enddate) < ($article->submitted_at)) ) : ?>
            <span class="text-warning"> <h5><b>Due</b></h5> </span>

            <?php else: ?>
            <span class="text-success"> <h5><b>On-Time</b></h5> </span>
          <?php endif; ?>

          </span>

            </p>
        </div>



            <div class="col-lg-2">
                <p><h5><b>Action :</b></h5> 
                    
            <div class="row"> 
                <?php if( is_null ( $article->status) ) : ?>
              
                <?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-sm btn-warning']); ?>
                <?php elseif( ($article->status) == 'In-Progress' ): ?> 
                <?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-sm btn-warning']); ?>
                <?php else: ?>                
                <?php endif; ?>
                         
                  &nbsp       
                <?= 
                form_open("admin/delete_article"),
                form_hidden('article_id', $article->id),
                form_submit(['name'=>'submit','value'=>'Delete', 'class'=>'btn btn-sm btn-danger']),
                form_close();
                ?> 
            </div>
                  </p> 
            </div>
</div>
</p><hr>

<div class="row">
    <div class="col-lg-2">
        <p><h5><b>Published :</b></h5><br/>
        <span> 
        	<?= date('d M Y H:i:s', strtotime($article->created_at) ) ?>
        </span>
        </p>
    </div>

        <div class="col-lg-2">
            <p><h5><b>Deadline :</b></h5><br/>
           <span class="text-danger"> <?= date('d M Y H:i:s', strtotime($article->enddate) ) ?> </span>
        </div>
</div>
<hr>


<div class="row">
    <div class="col-lg-2">

        <p><h5><b>Task Category :</b></h5><br/> 
            <span>
                <?= ucfirst($article->type) ?>
            </span>
        </p>
        
    </div>

    <div class="col-lg-2">

        <p><h5><b>Assigned :</b></h5><br/> 
            <span>
                <?= ucfirst($article->pname) ?>
            </span>
        </p>
       
    </div>

</div>
<hr>

<p><h5><b>Task Description :</b></h5><br/>	
	<span>
		<?= ucfirst($article->body) ?>
	</span>
</p><br/><hr>

<!--
<p><h5>Uploaded Files :</h5><br/> -->


<!-- <?php if ( ! is_null($article->file_path ) ) : ?> -->
<!-- <img src="<?= $article->file_path ?>" alt=""> -->
<!--The above will display image, and below line will display name -->
<!-- <?= $article->file_path ?>  -->
<br/><br/>

 <!-- <?php echo form_submit(['name'=>'submit','value'=>'Download Files','class'=>'btn btn-success']);?>  -->


<!--	<?= anchor("user/file_download/{$article->id}",'Download Files',['class'=>'btn btn-success']); ?> -->

	




  <?php else: ?>
  				<p>No Files </p>


<?php endif; ?>

<!-- <hr> -->


	

</div>
<?php include_once('admin_footer.php'); ?>

