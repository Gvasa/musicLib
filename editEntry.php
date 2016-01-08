

<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <base href="/">
	    <title>music Lib</title>
	    <meta name="description" content="">
	    <meta name="viewport" content="width=device-width">
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	    <link rel="stylesheet" type="text/css" href="css/custom.css" />
	    
	    <!-- Agency -->
	    <link rel="stylesheet" type="text/css" href="css/agency.css" />

	     <!-- Custom Fonts -->
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css' />
	    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css' />
	    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css' />
	</head>
	
	<?php
		
		ini_set('display_errors', 1);
		include('dbconnect.php');
		
		
		
	?>
	<body>

		 <section id="library" >
	        <div class="container" class="bg-light-gray">
	          <div class="row">
	                <div class="col-lg-12 text-center">
	                    <h2 class="section-heading">Edit Album</h2>
	                 
	                </div>
	            </div>		        
				<?php 	
					$edit_id = $_POST['edit_id'];
					$foundAlbums = false;

					include('savexml.php');
					include ('formatxml.php');
				?> 
			</div>
		</section>

			  <!-- jQuery -->
	    <script src="js/jquery.js"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>

	    <!-- Plugin JavaScript -->
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	    <script src="js/classie.js"></script>
	    <script src="js/cbpAnimatedHeader.js"></script>

	    <!-- Contact Form JavaScript -->
	    <script src="js/jqBootstrapValidation.js"></script>
	    <script src="js/contact_me.js"></script>

	    <!-- Custom Theme JavaScript -->
	    <script src="js/agency.js"></script>

	</body>


</html>

