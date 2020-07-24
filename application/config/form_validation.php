<?php

$config = [

			'add_article_rules'    => 	  [
												[

														'field' => 'title',
														'label' => 'Task Title',
														'rules' => 'required|trim',

												],

												[
														'field' => 'body',
														'label' => 'Task Description',
														'rules' => 'required', 
												],

												[
														'field' => 'pname',
														'label' => 'Assign Person',
														'rules' => 'required|trim', 
												],

												[
													   'field' => 'userfile',
													   'label' => 'Upload Files',
													   'rules' => '',	
												],

										  ],


			'admin_login'    => 	  [
												[

														'field' => 'username',
														'label' => 'Username',
														'rules' => 'required|alpha|trim',

												],

												[
														'field' => 'password',
														'label' => 'Password',
														'rules' => 'required', 
												]

										 ]							  

];

