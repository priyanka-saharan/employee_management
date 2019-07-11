<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<style>	
			header {
				background-color:#e6f2ff;
			}



			footer {
				background-color:#e6f2ff;
			}
			.mapouter {
				position:relative;
				text-align:right;
				height:136px;
				width:168px;
			}
			.gmap_canvas {
				overflow:hidden;
				background:none!important;
				height:136px;
				width:168px;
			}
			.tnc {
				text-align:right;
			}

			* {
				box-sizing: border-box;
			}

			body {
				font-family: Arial;
				font-size: 17px;
			}

			.container {
				position: relative;
				max-width: 2000px;
				margin: 0 auto;
			}

			.container img {
				vertical-align: middle;
				width:100%;
							
			}

			.container .content {
				position: absolute;
				bottom:100px;
				background: rgb(0, 0, 0); /* Fallback color */
				background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
				color: #f1f1f1;
				width: 100%;
				padding: 20px;
			}

		</style>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-inverse" >
				<ul class="nav navbar-nav">
					<li><img src="http://lms.anktech.co.in/images/company-logo.png" class="img-responsive" alt="ank.png" width="80" height="50"></li>					
					<li><a href="homepage.php"><i class="fa fa-fw fa-home"></i>
Home</a></li>
					<li><a href="emp_details.php"><i class='fas fa-list-ul'></i>
Employee details</a></li>
					<li><a href="project_list.php"><i class='fas fa-project-diagram'></i>
Project list</a></li>
					<li><a href="testtable.php"><i class='fas fa-list-ul'></i>
Assign project</a></li>
					<li><a href="feedbackform.php"><i class="fa fa-fw fa-envelope"></i>
Feedback</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>&nbsp;&nbsp;
				</ul>
			</nav>
		</header>
<?php		
if (isset ($_POST['contact_us']) ) {
	if (isset($_POST['email']) ) {
		header('location:contactform.php');
	}
}

?>
		<div class="container">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIFiVzqsl-aC7IYPo5ed5fHdK3jR86CZUdB5IZpM0R9E5_vHU1" alt="anktech home" style="width:100%;">
			<div class="content" style="max-width:1140;">
				<h1 align="center">Welcome to AnkTech</h1><hr style="max-width:500px;">
					<p>AnkTech Softwares is a pioneer company developing enterprise softwares, web and mobile applications in various domains since 2008. We create enterprise, digital products and experiences that help brands grow their online businesses.</p>
			</div>
		</div>

		<footer>
			<div class="row">
				<div class="col-md-4">
					<h2 align="center"> About Us</h2>
					<p>AnkTech Softwares Pvt. Ltd.,is a preeminent service provider in software sector. We provide premium IT solutions services to meet the diverse needs of clients spread across the globe leveraging on our commitment, domain knowledge and technical expertise.</p>
				</div>
				<div class="col-md-4">
					<h2>Our Company</h2>
					<div class="mapouter">
						<div class="gmap_canvas">
							<iframe width="168" height="136" id="gmap_canvas" src="https://maps.google.com/maps?q=anktech&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>								
						</div>
				
					</div><br>
					<p><span class="glyphicon glyphicon-globe"></span><span> Nasirabad Road Makhupura Ajmer.</span></p>
					<p><span class="glyphicon glyphicon-envelope"></span>  Email:-<a href="">anktech@gamil.com</a></p>
					<p><span class="glyphicon glyphicon-envelope"></span>  HR Email:-<a href="">hr123@anktech.co.in</a></p>
					<p><span class="glyphicon glyphicon-phone"></span> Contact No:-123456</p>
				</div> 
				<div class="col-md-4">
					<h2>Contact Us:</h2>
					<form action="" method="POST">
						Email : <input type="text" name="email" placeholder=" enter your email">
						<span><button type="submit" name="contact_us" class="btn btn-success">contact us</button></span>
					</form>
  				</div>
			</div>
		</footer>
		<footer>
			<p style="text-align:left;">
			&nbsp;copyright &copy;2019
			<span style="float:right;">terms amd conditions</span>
			</p>
		</footer>
	</body>
</html>
