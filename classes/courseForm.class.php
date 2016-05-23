<?php

  class courseForm {
  
    public function getHTML() {
    
      $db = dbConn::getConnection();
      $stmt = $db->prepare('SELECT DeptID FROM Departments');
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      $form = '<div class="panel panel-default">
                 <div class="panel-heading">Course Entry Form</div>
		 <div class="panel-body">
                 <form class="form-horizontal" action="index.php?controller=courseController" method="POST" role="form">
      	         <div class="form-group">
		   <label class="control-label col-sm-2" for="Cno">Course #</label>
		   <div class="col-sm-4">
		     <input type="text" name="Cno" class="form-control width" id="Cno" placeholder="Enter Course #">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Ctitle">Course Title</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Ctitle" id="Ctitle" placeholder="Course title">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Hours">Hours</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Hours" id="Hours" placeholder="Times of course">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="deptID">Dept ID</label>
		   <div class="col-sm-4">
		     <select class="form-control" name="DeptID" id="DeptID">';
      foreach($results as $result) {
        foreach($result as $key=>$value) {
	  $form .= '<option>' . $value . '</option>';
	}
      }

      $form .= '      </select>
                    </div>
		  </div>
                  <div class="form-group">
		    <div class="col-sm-offset-2">
		    <div class="col-sm-4">
		      <button type="submit" class="btn btn-primary">Create Course</button>
		    </div>
		    </div>
		  </div>
		  </form>
		  </div>
		</div>';
		 
      
      return $form;
    }
  }
