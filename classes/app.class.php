<?php
    // $_REQUEST is used to determine all of the parameters passed to the page  it holds all of the parameters
    // after the question mark in a url
    class app {
        
	public function __construct() {
            
	    $controller = 'homepageController';
            
	    if(isset($_REQUEST['controller'])) {
	      $controller = $_REQUEST['controller'];
	    }
	    
	    $route =  new $controller;

            
	    $request_method = $_SERVER['REQUEST_METHOD'];

	    $route->$request_method();

	    $page_output = $route->getHTML();

	    echo $page_output;
        }
    }
