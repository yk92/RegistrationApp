<?php

  class addInstForm {
  
    public function getHTML() {
    
      $db = dbConn::getConnection();
      $stmt = $db->prepare('SELECT DeptID FROM Departments');
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      $form = '<div class="panel panel-default">
                 <div class="panel-heading">
		   <i class="fa fa-pied-piper" arial-hidden="true">
		     Add Instructor Form
		   </i>
		 </div>
		 <div class="panel-body">
                 <form class="form-horizontal" action="index.php?controller=addInstController" method="POST" role="form">
      	         <div class="form-group">
		   <label class="control-label col-sm-2" for="Lname">Last Name</label>
		   <div class="col-sm-4">
		     <input type="text" name="Lname" class="form-control width" id="Lname" placeholder="Enter Family name">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Fname">First Name</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Fname" id="Fname" placeholder="Enter First name">
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
		    <label class="col-sm-2 control-label" for="Office">Office</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="Office" placeholder="Enter the office room #">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="Phone">Phone #</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="Phone" placeholder="Enter phone number">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="Email">Email</label>
		    <div class="col-sm-4">
		      <input type="text" name="Email" class="form-control" placeholder="Enter email address">
		    </div>
		  </div>
                  <div class="form-group">
		    <div class="col-sm-offset-2">
		    <div class="col-sm-4">
		      <button type="submit" class="btn btn-primary">Add Instructor</button>
		    </div>
		    </div>
		  </div>
		  </form>
		  </div>
		</div>';
		 
      
      return $form;
    }
  }
