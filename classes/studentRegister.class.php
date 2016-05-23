<?php

  class studentRegister {
  
    public function get() {
    
      echo '   <div class="panel panel-default">
                 <div class="panel-heading">Student ID Verification</div>
		 <div class="panel-body">
                 <form class="form-horizontal" action="index.php?controller=studentController" method="POST" role="form">
      	         <div class="form-group">
		   <label class="control-label col-sm-2" for="Sid">Student ID #</label>
		   <div class="col-sm-4">
		     <input type="text" name="Sid" class="form-control width" placeholder="Enter student ID #">
		   </div>
		 </div>
		   <input type="hidden" name="Term" value="' . $_REQUEST['term'] . '">
		   <input type="hidden" name="SectionNum" value="' . $_REQUEST['snum'] . '">
		   <input type="hidden" name="Cno" value="' . $_REQUEST['cno'] . '">
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
