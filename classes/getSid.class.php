<?php

  class getSid {
  
    public function get() {
    
      echo '   <div class="panel panel-default">
                 <div class="panel-heading">Enter Student ID</div>
		 <div class="panel-body">
                   <form class="form-horizontal" 
		         action="index.php?controller=studEditCourseController" 
		         method="POST" role="form">
      	           <div class="form-group">
		     <label class="control-label col-sm-2" for="Sid">Student ID #</label>
		     <div class="col-sm-4">
		       <input type="text" name="Sid" class="form-control width" placeholder="Enter student ID #">
		     </div>
		   </div>
		   <div class="col-sm-offset-2">
		     <div class="col-sm-4">
		       <button type="submit" class="btn btn-primary">Create Course</button>
		     </div>
		   </div>
		   </form>
		 </div>
	       </div>';
    }
  }
