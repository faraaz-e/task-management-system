<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?=base_url()?>/favicon.png" type="image/png">
  <title>TMS | Admin</title>

	<!-- <link rel="stylesheet" type="text/css" href="http://htdocs/ci/assets/css/bootstrap.min.css"> -->
	<!-- The above line is commented, to make URL dynamic, in case of migrating it from localhost to Live Server.
	Below Line is Dynamic. -->
	 <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
   <link rel="javascript" type="text/javascript" href="<?= base_url('assets/js/bootstrap.min.js'); ?>">
	 <!-- The above line will be loaded using Helper in User.php(Controller)-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
   


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


 <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.css" rel="stylesheet" /> -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand text-warning" href="<?= base_url('admin/dashboard'); ?>">TMS | Admin</a>
&nbsp &nbsp
  

  <a class="text-white" href="<?= base_url(''); ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><span class="sr-only">(current)</span></a>

&nbsp &nbsp

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

     
        

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      
     <!--  <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">About</a>	
      </li> -->
      </li>
    </ul>

    <ul class="navbar-nav mr-auto">
    <?= form_open('admin/search',['class'=>'form-inline my-2 my-lg-0', 'role'=>'search']) ?> 
    <!-- <form class="form-inline my-2 my-lg-0"> -->
      <input class="form-control mr-sm-2"  type="text" name="query" placeholder="Query">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    <?= form_close(); ?>

    <?= form_error('query',"<p class='navbar navbar-text my-sm-0 text-danger'>",'</p>'); ?>

   </ul>



   <ul class="navbar-nav mr-auto pull-right">
   
    <a href=" <?= base_url('login/logout') ?> "><button type="button" class="btn btn-outline-danger btn-sm border">Admin Logout</button></a>

         <!-- Use the above line or below line -->
       <!-- <button type="button" class="btn btn-outline-danger"><?= anchor('login/logout','Logout') ?> </a></button> -->
     </ul>
 </div>
</nav>
<br/>



