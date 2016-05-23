<?php

  class addSectionForm {
  
    public function getHTML() {
    
      $db = dbConn::getConnection();
      
      $stmt = $db->prepare('SELECT Cno FROM Courses');
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      $form = '<div class="panel panel-default">
                 <div class="panel-heading">Add Section</div>
		 <div class="panel-body">
                 <form class="form-horizontal" action="index.php?controller=addSectController" method="POST" role="form">
      	         <div class="form-group">
		   <label class="control-label col-sm-2" for="Term:">Term</label>
		   <div class="col-sm-4">
		     <input type="text" name="Term" class="form-control width" id="Term" placeholder="Enter Term">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Section">Section #:</label>
		   <div class="col-sm-4">
		     <input type="text" class="form-control" name="Section" id="Section" placeholder="Section number">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Cno">Course #:</label>
		   <div class="col-sm-4">
		    <select class="form-control" name="Cno" id="Cno">';
	
	foreach($results as $result) {
	  foreach($result as $key=>$value){
	    $form .= '<option>' . $value . '</option>';
	  }
	}

	$stmt = $db->prepare('SELECT Lname FROM Instructors');
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$form .= '</select>
		 </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Lname">Ins Last Name</label>
		   <div class="col-sm-4">
		     <select class="form-control" name="Lname" id="Lname">';
        foreach($results as $result) {
          foreach($result as $key=>$value) {
	    $form .= '<option>' . $value . '</option>';
	  }
        }

	$stmt = $db->prepare('SELECT Fname FROM Instructors');
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $form .= '   </select>
                   </div>
		  </div>
                  <div class="form-group">
		    <label class="col-sm-2 control-label" for="Fname">Ins First Name</label>
		    <div class="col-sm-4">
		      <select class="form-control" name="Fname" id="Fname">';
		 
        foreach($results as $result) {
	  foreach($result as $key=>$value){
	    $form .= '<option>' . $value . '</option>';
	  }
	}

	$stmt = $db->prepare('SELECT Lname FROM Instructors');
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
	$form .= '    </select>
	           </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Room">Room</label>
		   <div class="col-sm-4">
		     <input type="text" name="Room" class="form-control" id="Room" placeholder="Enter classroom">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Days">Days</label>
		   <div class="col-sm-4">
		     <input type="text" name="Days" class="form-control" id="Days" placeholder="Days of class">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="StartTime">Start Time</label>
		   <div class="col-sm-4">
		     <input type="text" name="StartTime" class="form-control" id="StartTime" placeholder="Starting Time">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="EndTime">End Time</label>
		   <div class="col-sm-4">
		     <input type="text" name="EndTime" class="form-control" id="EndTime" placeholder="Ending Time">
		   </div>
		 </div>
		 <div class="form-group">
		   <label class="col-sm-2 control-label" for="Capacity">Capacity</label>
		   <div class="col-sm-4">
		     <input type="text" name="Capacity" class="form-control" id="Capacity" placeholder="Class Capacity">
		   </div>
		 </div>
		 <div class="form-group">
		   <div class="col-sm-offset-2">
		   <div class="col-sm-4">
		     <button type="submit" class="btn btn-primary">Add Section</button>
		   </div>
		   </div>
		 </div>
	      </form>
	    </div>
	    </div>';

      
      return $form;
    }
  }
