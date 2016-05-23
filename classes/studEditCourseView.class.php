<?php

  class studEditCourseView extends view{
    
    //This view is for students to add and drop courses

    public function getHTML() {
      
      session_start();
      $sid = $_SESSION['Sid'];

      $db = dbConn::getConnection();

      $nameQry = $db->prepare('SELECT Lname, Fname FROM Students WHERE Sid = :Sid');
      $nameQry->execute( array( ':Sid'=>$sid ) );

      $name = $nameQry->fetchAll(PDO::FETCH_ASSOC);
      
      $this->html .= '<div class="well">
      			<h2>Welcome, ' . $name[0]['Fname'] . ' ' . $name[0]['Lname'] .
		       '</h2>
		      </div>';
      $this->html .= '<div class="panel panel-default">
      		       <div class="panel-heading">
		         <h3><i class="fa fa-pencil-square fa-lg">  Add / Drop Courses</i></h3>
		       </div>
		       <div class="panel-body">
		         <h3>Register for a class
			     <a class="btn active btn-primary" href="index.php?controller=registerController">
			       <i class="fa fa-wpbeginner" aria-hidden="true">
			         Register
			       </i>
			     </a>
			 </h3>
		       </div>
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
			 
      
      $sql = "SELECT * FROM Sections as S, Enrollments as E WHERE E.Sid = :Sid AND E.SectionNum = S.SectionNum";

      try {
	$qry = $db->prepare( $sql );
        $qry->execute( array( ':Sid'=>$sid ) );
      }

      catch( PDOException $e ) {
      
        echo $e->getMessage();
      }
      
      $results = $qry->fetchAll(PDO::FETCH_ASSOC);

      foreach( $results as $result ) {
        $this->html .= '<tr>';
        foreach( $result as $key => $value ) {
	  if( $key == 'Sid' ){
	    break;
	  }
	  
	  $this->html .= '<td>' . $value . '</td>';
	}
	
	$this->html .= '<td>
			  <a class="btn btn-danger active" 
			   href="index.php?controller=delCrs&Sid=' . $sid . 
			   				   '&Cno=' . $result['Cno'] .
							   '&Term=' . $result['Term'] .
							   '&Sno=' . $result['SectionNum'] . '">
			    <i class="fa fa-bomb">
			      Drop Course
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
