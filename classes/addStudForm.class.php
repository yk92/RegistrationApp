<?php

  class addStudForm {
  
    public function getHTML() {
    
      $db = dbConn::getConnection();
      
      $stmt = $db->prepare('SELECT DeptID FROM Departments');
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      $form = '<div class="panel panel-default">
                 <div class="panel-heading">Add Student</div>
		 <div class="panel-body">
                 <form class="form-horizontal" action="index.php?controller=addStudController" method="POST" role="form">
      	         <div class="form-group">
		   <label class="control-label col-sm-2" for="Sid">Student ID</label>
		   <div class="col-sm-4">
		     <input type="text" name="Sid" class="form-control width" placeholder="Enter ID #">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Lname">Last Name</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Lname" placeholder="Enter last name">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Fname">First Name</label>
		   <div class="col-sm-4">
		    <input type="text" class="form-control" name="Fname" placeholder="Enter first name">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Class">Class</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Class" placeholder="Enter Class">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="control-label col-sm-2" for="Phone">Phone #</label>
		   <div class="col-sm-4">
		     <input type="text" name="Phone" class="form-control width" placeholder="Enter Phone #">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Street">Street</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Street" placeholder="Street Address">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="City">City</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="City" placeholder="Enter City">
		   </div>
		 </div>
		 <div class="form-group">
	           <label class="col-sm-2 control-label" for="State">State</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="State" placeholder="Enter State">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Zipcode">Zipcode</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Zipcode" placeholder="Enter Zipcode">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Degree">Degree</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Degree" placeholder="Enter Degree">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="DeptID">Dept ID</label>
		   <div class="col-sm-4">
		     <select class="form-control" for="DeptID">';
	foreach($results as $result) {
	  foreach($result as $key=>$value){
	    $form .= '<option>' . $value . '</option>';
	  }
	}

	$form .= '</select>
		 </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Hours">Total Hours</label>
		   <div class="col-sm-4">
		     <input type="text" name="Hours" class="form-control" placeholder="Calculate total hours">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="GPA">GPA</label>
		   <div class="col-sm-4">
		     <input type="text" name="GPA" class="form-control" placeholder="Grade Point Average">
		   </div>
		 </div>
		 <div class="form-group">
		   <div class="col-sm-offset-2">
		   <div class="col-sm-4">
		     <button type="submit" class="btn btn-primary">Add Student</button>
		   </div>
		   </div>
		 </div>
	      </form>
	    </div>
	    </div>';

      
      return $form;
    }
  }
