<?php

  class courseController extends controller {

    public function get() {
      
      $form = new courseForm;
      $form_html = $form->getHTML();
      $this->html .= $form_html;
    }


    public function post() {
    
      $db = dbConn::getConnection();
      
      $sql = 'INSERT INTO Courses VALUES (:Cno, :Ctitle, :Hours, :DeptID)';
      $stmt = $db->prepare( $sql );
      
      try { $stmt->execute( array( ':Cno'=>$_POST['Cno'],
      				  ':Ctitle'=>$_POST['Ctitle'],
				  ':Hours'=>$_POST['Hours'],
				  ':DeptID'=>$_POST['DeptID']) ); }
	
      catch(PDOException $e) {
        echo $e->getMessage();
      }

      header('Location: index.php?controller=adminController');
    }
  }
