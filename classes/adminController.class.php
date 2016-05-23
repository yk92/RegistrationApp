<?php

  class adminController extends controller {
  
    public function get() {
     

      $this->html .= '<div class="page-header">
      		        <h1><i class="fa fa-archive fa-lg" aria-hidden="true">
			  Administration Functions | <small>Menu of admin features</small></i></h1>
		      </div>
		      <div class="panel panel-default">
		        <div class="panel-heading">Main Menu</div>
			<div class="panel-body">
			  <p>The current administrative menu does not contain all fully
			     functioning features.
			  </p>
			</div>

			<!-- List group -->
			<div class="list-group">
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=courseController">Create new course</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=addSectController">Create new section</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=editInstController">Add/Drop Instructor</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=editSectController">Add/Drop Sections</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=editStudController">Add/Drop Students</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=instListController">Instructor Listing</a>
			  </button>
			</div>
		      </div>';

    }
  }
