<?php

  class instructorList extends view{
    
    //this view is for outputting the list of all the professors into a table. Also Add professors button will be here
    //Need to fix the size of the instructor's names and get rid of the page header for each one. Instead make one Header incl name
    //one after the other. So several different panels in a row. or maybe 1 panel with several tables.
    
    public function getHTML() {
      
      $db = dbConn::getConnection();
      
      $qry = $db->prepare('SELECT Lname, Fname FROM Instructors');
      $qry->execute();

      $results = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach($results as $result) {
        $this->html .= '<div class="well">
	                  <h3>' . $result['Lname'] . ', ' . $result['Fname'] . '</h3></div>';
       

        $this->html .=  '<div class="container">
	                 <table class="table">
		         <thead>
			 <tr>
			   <th>Term</th>
			   <th>Section #</th>
			   <th>Course #</th>
			   <th>Instr Lname</th>
			   <th>Instr Fname</th>
			   <th>Room</th>
			   <th>Days</th>
			   <th>Start Time</th>
			   <th>End Time</th>
			   <th>Capacity</th>
			 </tr>
			 </thead>
			 <tbody>';
			 
      $queryTwo = $db->prepare('SELECT * FROM Sections WHERE InstrLname = :Lname and InstrFname = :Fname');
      $queryTwo->execute( array(':Lname'=>$result['Lname'], ':Fname'=>$result['Fname'] ) );
      
      $instructors = $queryTwo->fetchAll(PDO::FETCH_ASSOC);

      foreach( $instructors as $instructor ) {
        $this->html .= '<tr>';
        foreach( $instructor as $key => $value ) {
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
        
	$this->html .= '</tr>';
      }
      $this->html .= '</tbody>
                      </table>
		      </div>';

      }

      return $this->html;
    }
  }
