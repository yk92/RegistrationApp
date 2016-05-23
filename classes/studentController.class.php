<?php

  class studentController extends controller {
  
    public function get() {
     

      $this->html .= '<div class="page-header">
      		        <h1><i class="fa fa-qq fa-lg" aria-hidden="true">
			  Student Functions | <small>Menu of student registration features</small></i></h1>
		      </div>
		      <div class="panel panel-default">
		        <div class="panel-heading">Main Menu</div>
			<div class="panel-body">
			  <p>The current student registration menu does not contain all fully
			     functioning features.
			  </p>
			</div>

			<!-- List group -->
			<div class="list-group">
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=registerController">Register for Classes</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=getSid">Add / Drop Courses</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=getSid">Transcript Request</a>
			  </button>
			  <button type="button" class="list-group-item">
			    <a href="index.php?controller=getSid">GPA Calculator</a>
			  </button>
			</div>
		      </div>';

    }

    public function post() {
      
      $db = dbConn::getConnection();
      $qry = $db->prepare('INSERT INTO Enrollments VALUES (:Sid, :Term, :Cno, :SectionNum, :Grade)');
      $grade = 4; 
      try {
        $qry->execute( array( ':Sid'=>$_POST['Sid'],
			      ':Term'=>$_POST['Term'],
			      ':Cno'=>$_POST['Cno'],
			      ':SectionNum'=>$_POST['SectionNum'],
			      ':Grade'=>$grade ) );
        
	header('Location: index.php?controller=studEditCourseController');
      }

      catch (PDOException $e) {
        echo $e->getMessage();
      }

    }
  }
