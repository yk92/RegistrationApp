<!doctype html>
  <html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
      <link rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css"/>
      <link rel="stylesheet"
      href="css/main.css">
      <script   src="https://code.jquery.com/jquery-1.12.3.min.js"
        integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
	crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
	crossorigin="anonymous"></script>
      <title>CS434 Project</title>
    </head>
    <body>
      <nav class="bg-warning navbar navbar-default">
        <div class="container">
	<div class="navbar-header">
          <a class="navbar-brand" href="index.php">CS434 Project</a>
	</div>
        <ul class="nav navbar-nav">
	  <li class="active"><a href="index.php">Home</a></li>
	  <li><a href="index.php?controller=adminController">Administration</a></li>
	  <li><a href="index.php?controller=reportController">Reports</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="index.php?controller=studentController"><span class="glyphicon glyphicon-user"></span> Students</a></li>
	  <li><a href="index.php?controller=logoutController"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	</ul>
	</div>
      </nav>
<?php
  function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
  }

  spl_autoload_register('my_autoloader');
  
  $db = dbConn::getConnection();  

  $app = new app;
?>
      <div class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="navbar-text pull-right">
	  &copy; <?php echo date("Y"); ?> Yuval Klein, inc.
        </p>
      </div>
      </div>
    </body>
  </html>
