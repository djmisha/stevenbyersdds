<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" />
	<title>Page Not Found</title>
	<style>
		html {
			background: #82D5B8; /* DARK color */
			color: #fff; /* BODY text color */
			font-family: 'OpenSans', sans-serif;
			font-size: 14px;
			line-height: 1.2em;
			padding:0;
			margin:0;
			text-align: center;
		}
		body {
			background:none;
			padding:0;
			margin:0;
		}
		a {
			color: #fff; /* BODY LINK text color */
		}
		h1 {
			font-family: 'OpenSans', sans-serif;
			font-size: 60px;
			line-height: 60px !important;
			font-weight: bold;
			color: #fff;
			margin: 0 0 40px 0;
			text-transform: uppercase;
		}
		h1, h2, h3, h4, h5, p {
			margin: 0 0 40px 0;
			line-height:1.3em;
			color: #fff;
		}

		#container {
			margin: 0 auto;
			max-width: 600px;
			display:block;
			padding:60px 15px 0 15px;
		}

		#error_txt {
			width:100%;
			margin: 0;
			font-size: 18px;
		}
		#four-oh-four-nav-wrap {
			border-top: 20px solid #1B3650;  /* LIGHT color */
			border-bottom: 20px solid #1B3650;  /* LIGHT color */
			text-align:center;
			width:100%;
			background: #fff; /* LINKS background color */
		}
		#four-oh-four-nav-wrap nav {
			max-width:600px;
			width: 100%;
			margin: 0 auto;
			color: #000;
			font-size: 14px;
			line-height: 1em;
		}
		#four-oh-four-nav-wrap nav a {
			color: #3a4859;
			text-decoration: underline;
			font-weight: bold;
		}
		#four-oh-four-nav-wrap nav ul {
			display:block;
			/*border-top: 1px solid #e1ab4c; /* DARK color */*/
			text-align: center;
			padding:0;
			margin: 20px 15px;
		}
		#four-oh-four-nav-wrap nav ul li {
			display:block;
			height:auto;
			/*border-bottom: 1px solid #e1ab4c; /* DARK color */*/
			list-style: none;
			font-size: 29px;
			line-height:1em;
		}
		#four-oh-four-nav-wrap nav ul li a {
			display: block;
			padding: 10px 5px;
			height:auto;
			text-decoration: none;
			color: #1B3650;
			text-transform: uppercase;
		}
		#four-oh-four-nav-wrap nav ul li a:hover {
			text-decoration: none;
			background-color: #1B3650;
			color: #fff;
		}
		footer {
			text-align: center;
		}
		.copy {
			text-align: center;
			margin: 40px auto;
		}
		.copy a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="error_txt">
			<h1>Page Not Found</h1>
			<p>We apologize for the inconvenience, but it seems that you’ve stumbled upon a page that doesn’t exist here.</p>
		</div>
	</div>
	<div id="four-oh-four-nav-wrap">
		<nav>
			<?php wp_nav_menu(array('menu' => 'Main', 'depth' => 1));?>
		</nav>
	</div>
	<footer>
		<p class="copy">Copyright &copy; <?php echo date("Y")?> <?php bloginfo('name');?><br/>
		Website Developed by <a href="https://www.silvragency.com/" target="_blank" title="SILVR Agency">SILVR Agency</a></p>
	</footer>
</body>
</html>

