<?php

  class reportController extends controller {
  
    public function get() {
     

      $this->html .= '<div class="page-header">
      		        <h1><i class="fa fa-folder-open fa-lg" aria-hidden="true">
			  Reporting Functions | <small>Menu of report features</small></i></h1>
		      </div>
		      <div class="panel panel-default">
		        <div class="panel-heading">Main Menu</div>
			<div class="panel-body">
			  <p>The current reporting menu does not contain all fully
			     functioning features.
			  </p>
			</div>

			<!-- List group -->
			<div class="list-group">
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=scheduleController">Schedule of Classes</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=catalogController">Show Course Catalog</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=honorsController">Honors List</a>
			  </button>
			</div>
		      </div>';

    }
  }
