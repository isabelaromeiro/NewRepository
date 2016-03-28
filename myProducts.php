<!DOCTYPE html>
<html lang = 'eng'>
	<head>
		<title>Main Page - Radford Yard Sale</title>
		<meta charset = 'utf-8' />
		<style type="text/css">

		/*General formating*/
		html {
			max-width: 1000px;
			margin: auto;
			font-family: ‘Lucida Sans Unicode’, ‘Lucida Grande’, sans-serif;
		}

		a {
			text-decoration: none;
			color: black;
		}

		a:hover {
			text-decoration: underline;
		}
		/*End of general formating*/

		/*CSS for the navigation bar*/
		nav {
			height: 50px;
			background-color: #f6f6f6;
		}

		.logo {
			width: 300px;
			height: 50px;
			margin-left: 10px;
		}

		#searchbox {
			width: 300px;
			height: 30px;
			background: white url('http://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png') no-repeat 9px center;
			padding: 9px 10px 9px 32px;
			border: solid 1px #ccc;
			border-radius: 10em;
			font-size: 100%;
			position: relative;
		}

		.search-name {
			float: right;
			display: inline-block;
			margin-top: 5px;
			margin-right: 10px;
		}

		.menu {
			padding: 10px;
			display: inline-block;
			font-size: 18px;
			margin-left: 30px;
			margin-right: 10px;
			z-index: 1;
		}

		.menu:hover {
			background-color: #ddd;
		}

		ul {
			list-style: none;
			position: relative;
			margin: 0;
			padding: 0;
		}

		.menu ul {
			list-style: none;
			position: absolute;
			top: 100%;
			left: 0;
			background: #ddd;
			padding: 0;
		}

		.menu div {
			display: none;
			position: absolute;
			margin-left: -40px;
			margin-top: 10px;
		}

		.menu:hover .content {
			display: block;
		}

		.content li {
			background-color: #f6f6f6;
			position: relative;
			line-height: 32px;
			width: 130px;
			text-align: center;
		}

		.content li:hover {
			background-color: #ddd;
		}
		/*End of CSS for the nav bar*/

		/*CSS for the aside */
		aside {
			margin-top: 10px;
			display: block;
			width: 200px;
			float: left;
		}

		aside li {
			list-style: none;
			font-size: 18px;
			margin: 0;
			padding: 10px;
			background-color: #f6f6f6;
		}

		aside li:hover {
			background-color: #ddd;
		}

		.menuTitle {
			background-color: #ddd;
		}
		/*End of aside CSS*/

		/*CSS for the article*/
		.mostRecent {
			position: relative;
			font-size: 18px;
			left: 50%;
			margin-left: -375px;
			background-color: #ddd;
			margin-top: 10px;
			width: 750px;
			padding: 10px;
			margin-bottom: 10px;
		}

		.product {
			position: relative;
			font-size: 18px;
			left: 50%;
			margin-left: -375px;
			background-color: #f6f6f6;
			width: 750px;
			padding: 10px;
			border-bottom: 10px solid white;
			display: table;
		}

		.product:hover {
			background-color: #ddd;
		}

		.img {
		    margin: 5px;
			border: 1px solid #ccc;
		    float: left;
			width: 180px;
			height: 100px;
			position: relative;
		}

		.productImage {
			display: block;
			max-width: 100%;
			max-height: 100%;
			margin-left: auto;
			margin-right: auto;
		}

		.product ul {
			position: relative;
			vertical-align: middle;
			display: table-cell;
			margin-right: 200px;
		}

		.left {
			text-align: left;
			position: relative;
			float: left;
			margin-left: 200px;
			margin-top: -100px;
			margin-right: 150px;
			max-height: auto;
			width: 300px;
		}

		.right {
			text-align: left;
			position: relative;
			float: right;
			margin-top: -100px;
		}

		.top {
			margin-top: 10px;
			margin-bottom: 60px;
		}

		/*CSS for the footer */
		footer {
				display: block;
				position: absolute;
				color: white;
				bottom: 0;
				left: 50%;
				margin-left: -150px;
				width: 300px;
				height: 100px;
				text-align: center;
				color: black;
		}

		footer p {
			display: block;
		}
		/*End of footer CSS*/
		</style>
		<script type="text/javascript">


		</script>
	</head>
	<body>
		<nav>
			<a href='mainPage.php'>
				<img class='logo' src="http://imageshack.com/a/img923/1980/De7xLd.png" alt='Logo'>
			</a>
			<div class='search-name'>
				<input type='search' id='searchbox' name='search' placeholder='Search'/>
				<ul id='menu' class='menu'>
					<li>
						<?php
							$conn = mysqli_connect('localhost', 'proj6', 'brasil2016', 'proj6');
							if (!$conn ){
								echo 'erro';
							}
							$result = mysqli_query($conn, "SELECT name FROM user WHERE email = 'tanna@email.com'");
							if (!$result) {
							    echo 'Could not run query: ' . mysql_error();
							    exit;
							}
							$row = mysqli_fetch_row($result);
							echo $row[0];
							?> &#9662;</li>
					<div class='content'>
						<ul>
							<li><a href="announce.php">Announce</a></li>
							<li><a href="myProducts.php">My Products</a></li>
							<li><a href="loginPage.php">Logout</a></li>
						</ul>
					</div>
				</ul>
			</div>
		</nav>
		<p class='mostRecent'>My Products</p>
		<div class='product'>
			<div class='img'>
				<img class='productImage' src='http://imageshack.com/a/img922/3029/r6oeNE.jpg' alt='Microwave'/>
			</div>
			<div class='left'>
				<ul>
					<li class='top'>Microwave - Good Condition</li>
					<li>Home & Kitchen</li>
				</ul>
			</div>	
			<div class='right'>
				<label class='soldCheckbox'><input type='checkbox' value='sold'/> Sold</label>
				<ul>
					<li class='top'>$50.00</li>
					<li>03/27/2016</li>
				</ul>	
			</div>
		</div>
		<div class='product'>
			<div class='img'>
				<img class='productImage' src='http://imageshack.com/a/img922/2083/z9l0Eh.jpg' alt='Book'/>
			</div>
			<div class='left'>
				<ul>
					<li class='top'>Programming the World Wide Web (8th Edition) - Used</li>
					<li>Category</li>
				</ul>
			</div>	
			<div class='right'>
				<label class='soldCheckbox'><input type='checkbox' value='sold'/> Sold</label>
				<ul>
					<li class='top'>Price</li>
					<li>Date Posted</li>
				</ul>	
			</div>
		</div>

		<footer>
			<p>Radford Yard Sale | 2016</p>
			<p>Contact us: <a href='mailto:radfordyarsale@gmail.com'>radfordyardsale@gmail.com</a></p>
		</footer>
	</body>
</html>