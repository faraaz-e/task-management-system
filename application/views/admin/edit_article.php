<?php include_once('admin_header.php'); ?>

<div class="jumbotron">
<div class="container">
	<?php echo form_open_multipart("admin/update_article/{$article->id}", ['class'=> 'form-horizontal'] ) ?>

  <?php echo form_hidden('user_id', $this->load->session->userdata('user_id')); ?>
 
  <fieldset>
    <legend><center><h3>Edit Task</h3></center></legend><br/> 

  <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleSelect1">Type</label>   

    <?php echo form_dropdown(['name'=>'type','class'=>'form-control', 'options'=>array('Construction'=>'Construction','General Trading'=>'General Trading','Accountancy'=>'Accountancy','IT'=>'IT', 'Cafe'=>'Cafe', 'General (Other)'=>'General (Other)') , 'selected'=> $article->type ,'value'=>set_value('type')]);?>
    </div>
    </div>
    </div>
    <?php echo form_error('type'); ?> 




    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task Title</label>   
    <?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Enter Title','value'=>set_value('title',$article->title)]);?>
    </div>
    </div>
    </div>
    <?php echo form_error('title'); ?>
   
    

    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task Description</label>
   
    <?php echo form_textarea(['name'=>'body','class'=>'form-control','rows'=>'4', 'placeholder'=>'Enter Description','value'=>set_value('body',$article->body)]);?>
    	
    </div>
    </div>
    </div>
    <?php echo form_error('body'); ?> 



    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Assign</label>   

    <?php echo form_input(['name'=>'pname','class'=>'form-control', 'placeholder'=>'Person Name','value'=>set_value('pname',$article->pname)]);?>
    </div>
    </div>  
    </div>
    <?php echo form_error('pname'); ?>



    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task End Date</label>  
    <?php echo form_input(['name'=>'enddate','class'=>'form-control', 'placeholder'=>'Click to add Task Deadline', 'id'=>'example1', 'value'=>set_value('enddate', $article->enddate)]);?>
        <script type="text/javascript">
                $(document).ready(function () {               
                $('#example1').datepicker({
                    format: "yyyy-m-dd 23:59:59",
                    startDate: new Date()
                }); 
            
            });
        </script>

    </div>
    </div>  
    </div>
 
    <br/>
    
    		
    </fieldset>
	
      	<?php echo form_submit(['name'=>'submit','value'=>'Update Task','class'=>'btn btn-info']);?>
 </form>
</div>	

<?php include_once('admin_footer.php'); ?>
