<?php include_once('admin_header.php'); ?>

<div class="jumbotron">
<div class="container">
	<?php echo form_open_multipart('admin/store_article', ['class'=> 'form-horizontal'] ) ?>
	<!-- The above line is added to send the user login request to admin.php controller -->

    <?php echo form_hidden('user_id', $this->load->session->userdata('user_id')); ?>

     <!-- <?php echo form_hidden('created_at', date('d M Y H:i:s')) ?> -->


      <?php
        date_default_timezone_set("Asia/Kolkata");      
        echo form_hidden ('created_at' , date("Y-m-d H:i:s"))
      ?>


 
  <fieldset>
    <legend><center><h3>Add Task</h3></center></legend><br/> 

  <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleSelect1">Type</label>   

    <?php echo form_dropdown(['name'=>'type','class'=>'form-control', 'options'=>array('Construction'=>'Construction','General Trading'=>'General Trading','Accountancy'=>'Accountancy','IT'=>'IT', 'Cafe'=>'Cafe', 'General (Other)'=>'General (Other)') , 'selected'=>'Construction' ,'value'=>set_value('type')]);?>
    </div>
    </div>
    </div>
    <?php echo form_error('type'); ?> 




    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task Title</label>   
      <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
      	<!-- Replacing the above line with the below line, it is a form helper that is loaded in controllers/login.php   -->
    <?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Enter Title','value'=>set_value('title')]);?>
    </div>
    </div>
    </div>
    <?php echo form_error('title'); ?>
   
    

    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task Description</label>
   
    <?php echo form_textarea(['name'=>'body','class'=>'form-control','rows'=>'4', 'placeholder'=>'Enter Description','value'=>set_value('body')]);?>
    	
    </div>
    </div>
    </div>
    <?php echo form_error('body'); ?> 



    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Assign</label>   

    <?php echo form_input(['name'=>'pname','class'=>'form-control', 'placeholder'=>'Person Name','value'=>set_value('pname')]);?>
    </div>
    </div>  
    </div>
    <?php echo form_error('pname'); ?>

    
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Task End Date</label>  
    <?php echo form_input(['name'=>'enddate','class'=>'form-control', 'placeholder'=>'Click to add Task Deadline', 'id'=>'example1', 'value'=>set_value('enddate')]);?>

        <!-- <input  class="form-control" type="text" placeholder="Click to add Deadline" id="example1"> --> 
                <script type="text/javascript">
                        $(document).ready(function () {
                        // $( "#datepicker" ).datepicker({ minDate: 0});             
                        $('#example1').datepicker({
                            format: "yyyy-m-dd 23:59:59",
                            startDate: new Date()
                        });       
                    });
                </script>     
    </div>
    </div>  
    </div>



<!--
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputFile">File Upload</label>   
    <?php echo form_upload(['name'=>'userfile','class'=>'form-control-file']);?>
    </div>
    </div>
    </div>
    <?php  if(isset($upload_error)) echo $upload_error ?>
    <br/>
 -->   

    
    <br/>

    		
    </fieldset>




    <button type="reset" class="btn btn-secondary">Reset</button>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    	<!-- Replacing the above line with the below line, it is a form helper that is loaded in controllers/login.php   -->
      	<?php echo form_submit(['name'=>'submit','value'=>'Add Task','class'=>'btn btn-info']);?>


 </form>
</div>	

<?php include_once('admin_footer.php'); ?>