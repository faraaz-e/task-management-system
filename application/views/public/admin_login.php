<?php include('public_header.php');?>

<div class="container">

	<?php echo form_open('login/admin_login', ['class'=> 'form-horizontal'] ) ?>
 
  <fieldset>
    <legend><center><h4><b>Admin Login<b></h4></center></legend><br/><br/>

    <div class="jumbotron bg-light">

    <?php if( $error = $this->session->flashdata('login_failed')): ?>
    
    <div class="row">
    <div class="col-lg-6">

      <div class="alert alert-dismissible alert-danger">
 
        <h4 class="alert-heading"></h4>
        <p class="mb-0"> <?= $error ?> </p>
      </div>

    </div>
    </div>

   <?php endif; ?>



    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>   
    <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]);?>
    </div>
    </div>
    </div>
    <?php echo form_error('username'); ?>
   
    

    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']);?>
    	
    </div>
    </div>
    </div>
    <?php echo form_error('password'); ?>

 	<br/>   		
	    
    <button type="reset" class="btn btn-secondary">Reset</button>
      	<?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-info']);?>
 </form>
 </fieldset>
</div>	

	<?php include('public_footer.php');?>
