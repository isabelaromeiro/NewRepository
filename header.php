<?php 
	require_once("db.php");
	require_once("utils.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Radford Yard Sale</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<!-- Latest compiled and minified Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<style type="text/css">
			html, body { height: 100%; }

			body { margin: 0px; padding: 0px; }

			.navbar {
				background-color: rgb(246, 246, 246);
			}
			.navbar-brand img {
				width: 254px;
				height: 50px;
				margin-top: -15px;
			}

			.dropdown {
				margin-top: 7px;
			}

			#search_box_navbar {
				width: 400px;
			}

			#wrap { width: 100%; min-height: 100%; height: 100%; margin: 0px 0px -41px 0px; }

			.footer {width: 100%; height: 41px; }

			.text-muted{
				text-align: center;
			}

			/*div#content_wrapper { width: 100%; padding: 0px 0px 41px 0px; }

			div#footer_wrapper, div#content_wrapper { min-width: 942px; }

			div#footer_inner_wrapper, div#content_inner_wrapper { width: 942px; margin: 0px auto; }*/




		</style>

    </head>
    <body class="container">
    	<div id="wrap" >
    	<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="mainPage.php">
                    <img src="http://imageshack.com/a/img923/1980/De7xLd.png" height="75px">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            	<!--  SEARCH BOX -->
	            <div class="col-sm-3 col-md-4 col-md-offset-1">
			        <form class="navbar-form" role="search" action="search-handler.php" method="get">
			        <div class="input-group" id="search_box_navbar">
			            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
			            <div class="input-group-btn">
			                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
			        </form>
			    </div>

			    <?php echo header_dropdown(); ?> 
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
