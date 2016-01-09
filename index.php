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

	<body>
	  
	    <?php 
	    	$edit_id = -1;
	    	include ('dbconnect.php');
			include ('savexml.php');
	    ?>
	    <header>
	        <div class="container" >
	            <div class="intro-text">
	                <div class="intro-lead-in">musicLib</div>
	                <div class="intro-heading">Share and find new music</div>
	                <a href="#library" class="page-scroll btn btn-xl">Library</a>
	            </div>
	        </div>
	    </header>
		 <section id="library" class="bg-light-gray">
	        <div class="container">
	          <div class="row">
	                <div class="col-lg-12 text-center">
	                    <h2 class="section-heading">Library</h2>
	                    
	                   	<p class="text-muted">
	                   		Add a album, either search for a album or artist. If both fields are filled, the album will be added directly.
	                   	</p>
	                   	<form action="insertEntry.php" method="POST">
	                   		<div class="row">
	                   			<div class="col-lg-12 text-center top-pad-4px">
									<p class="text-muted">Album </p><input type="text" name="albumName" value=""/>
								</div>
							</div>
							<div class="row">
	                   			<div class="col-lg-12 text-center top-pad-4px">
									<p class="text-muted">Artist</p><input type="text" name="artist" value="" />
								</div>
							</div>
							<div class="row">
	                   			<div class="col-lg-12 text-center top-pad-4px">
									<input class="btn btn-primary" type="submit" name="submit" value="Add library"/>
								</div>
							</div>
						</form>
	                </div>
	            </div>
		        
				<?php 	
			 		$edit_id = -1;
			 		$foundAlbums = false;
					include 'formatxml.php';
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

	<?php $dbConn->close() ?>
</html>

