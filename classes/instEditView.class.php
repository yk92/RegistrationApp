<?php

  class instEditView extends view{
    
    //this view is for outputting the list of all the professors into a table. Also Add professors button will be here
    public function getHTML() {
      
      $db = dbConn::getConnection();
      
      $this->html = '<div class="panel panel-default">
      		       <div class="panel-heading">
		         <h3><i class="fa fa-pied-piper fa-lg">Add / Drop Instructors</i></h3>
		       </div>
		       <div class="panel-body">
		         <p>Add an Instructor
			     <a class="btn active btn-primary" href="index.php?controller=addInstController">
			       <i class="fa fa-exclamation-triangle" aria-hidden="true">
			         Add Instructor
			       </i>
			     </a>
			 </p>
		       </div>
		       <table class="table">
		         <thead>
			 <tr>
			   <th> Last Name </th>
			   <th> First Name </th>
			   <th> Department </th>
			   <th> Office </th>
			   <th> Phone </th>
			   <th> Email </th>
			 </tr>
			 </thead>
			 <tbody>';
			 
      $qry = $db->prepare('SELECT * FROM Instructors');
      $qry->execute();
      
      $results = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach( $results as $result ) {
        $this->html .= '<tr>';
        foreach( $result as $key => $value ) {
	  if( $key == 'Email' ){
	    $email = $value;
	  }
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
	//$this->html .= '</tr>';
	$this->html .= '<td>
			  <a class="btn btn-danger active" 
			   href="index.php?controller=delInst&inst=' . $email . '">
			    <i class="fa fa-user-times">
			      Delete
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
