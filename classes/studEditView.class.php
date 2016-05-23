<?php

  class studEditView extends view{
    
    //this view is for outputting the list of all the professors into a table. Also Add professors button will be here
    public function getHTML() {
      
      $db = dbConn::getConnection();
      
      $this->html = '<div class="panel panel-default">
      		       <div class="panel-heading">
		         <h3><i class="fa fa-pied-piper fa-lg">Add / Drop Students</i></h3>
		       </div>
		       <div class="panel-body">
		         <p>Add a Student
			     <a class="btn active btn-primary" href="index.php?controller=addStudController">
			       <i class="fa fa-book" aria-hidden="true">
			         Add Student
			       </i>
			     </a>
			 </p>
		       </div>
		       <table class="table">
		         <thead>
			 <tr>
			   <th>Student ID</th>
			   <th>Lname</th>
			   <th>Fname</th>
			   <th>Class</th>
			   <th>Phone</th>
			   <th>Street</th>
			   <th>City</th>
			   <th>State</th>
			   <th>Zipcode</th>
			   <th>Degree</th>
			   <th>Dept ID</th>
			   <th>Hours</th>
			   <th>GPA</th>
			 </tr>
			 </thead>
			 <tbody>';
			 
      $qry = $db->prepare('SELECT * FROM Students');
      $qry->execute();
      
      $results = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach( $results as $result ) {
        $this->html .= '<tr>';
        foreach( $result as $key => $value ) {
	  if( $key == 'Sid' ){
	    $sid = $value;
	  }
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
	
	$this->html .= '<td>
			  <a class="btn btn-danger active" 
			   href="index.php?controller=delInst&inst=' . $sid . '">
			    <i class="fa fa-hand-spock-o" arial-hidden="true">
			      Drop Student
		            </i>
			  </a>
			</td></tr>';
      }
      $this->html .= '</tbody>
                      </table>
		      </div>';



      return $this->html;
    }
  }
