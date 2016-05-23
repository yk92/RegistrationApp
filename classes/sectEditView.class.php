<?php

  class sectEditView extends view{
    
    //this view is for outputting the list of all the sections into a table. Also Add sections button will be here
    public function getHTML() {
      
      $db = dbConn::getConnection();
      
      $this->html = '<div class="panel panel-default">
      		       <div class="panel-heading">
		         <h3><i class="fa fa-pied-piper fa-lg">Add / Drop Sections</i></h3>
		       </div>
		       <div class="panel-body">
		         <p>Add a new section
			     <a class="btn active btn-primary" href="index.php?controller=addSectController">
			       <i class="fa fa-mortar-board" aria-hidden="true">
			         Add Section
			       </i>
			     </a>
			 </p>
		       </div>
		       <table class="table">
		         <thead>
			 <tr>
			   <th>Term</th>
			   <th>Section #</th>
			   <th>Course #</th>
			   <th>Inst. Lname</th>
			   <th>Inst. Fname</th>
			   <th>Room</th>
			   <th>Days</th>
			   <th>Start Time</th>
			   <th>End Time</th>
			   <th>Capacity</th>
			 </tr>
			 </thead>
			 <tbody>';
			 
      $qry = $db->prepare('SELECT * FROM Sections');
      $qry->execute();
      
      $results = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach( $results as $result ) {
        $this->html .= '<tr>';
        foreach( $result as $key => $value ) {
	  if( $key == 'Term' ){
	    $term = $value;
	  }
	  if( $key == 'SectionNum' ) {
	    $sec = $value;
	  }
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
	
	$this->html .= '<td>
			  <a class="btn btn-danger active" 
			   href="index.php?controller=delSec&term=' . $term . '&sec=' . $sec . '">
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
