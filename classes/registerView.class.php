<?php

  class registerView extends view{
    
    //this view is intended to show all of the available courses and allow the student to register for whatever they want
     
    public function getHTML() {
      
      $db = dbConn::getConnection();
      
      
      $this->html .=  '<div class="panel panel-default">
      		         <div class="panel-heading">
			   <h2>
			     <i class="fa fa-file-text" arial-hidden="true">
			       List of Sections
			     </i>
			   </h2>
			 </div>
	                 <table class="table table-hover">
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
			 
      $qry = $db->prepare('SELECT * FROM Sections');
      $qry->execute();
      
      $sections = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach( $sections as $section ) {
        $this->html .= '<tr>';
        foreach( $section as $key => $value ) {
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
        
	$this->html .= '<td>
			  <a class="btn btn-primary active" 
			   href="index.php?controller=studentRegister&term=' . $section['Term'] .
			          				    '&snum=' . $section['SectionNum'] .
								    '&cno='  . $section['Cno'] . '">
			    <i class="fa fa-plus-square" arial-hidden="true">
			      Register
			    </i>
			  </a>
			</td>
			</tr>';
      }
      $this->html .= '</tbody>
                      </table>
		      </div>';

      

      return $this->html;
    }
  }
