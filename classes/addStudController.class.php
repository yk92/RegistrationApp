<?php

  class addStudController extends controller {
    
    public function get() {
      
      $form = new addStudForm;
      $form_html = $form->getHTML();
      $this->html .= $form_html;
    }

    public function post() {

      $db = dbConn::getConnection();

      $stmt = $db->prepare('INSERT INTO Students VALUES (:Sid, :Lname, :Fname, :Class, :Phone, :Street, :City, :State, :Zip, :Degree, :DeptID,
      :Hours, :GPA)');
      
      try { $stmt->execute( array( ':Sid'=>$_POST['Sid'],
      			     ':Lname'=>$_POST['Lname'],
			     ':Fname'=>$_POST['Fname'],
			     ':Class'=>$_POST['Class'],
			     ':Phone'=>$_POST['Phone'],
			     ':Street'=>$_POST['Street'],
			     ':City'=>$_POST['City'],
			     ':State'=>$_POST['State'],
			     ':Zip'=>$_POST['Zip'],
			     ':Degree'=>$_POST['Degree'],
			     ':DeptID'=>$_POST['DeptID'],
			     ':Hours'=>$_POST['Hours'],
			     ':GPA'=>$_POST['GPA']) ); }
      catch(PDOException $e) {
        echo $e->getMessage();
      }

      header('Location: index.php?controller=editStudController');

    }

    public function put() {
    
    }

    public function delete() {
    
    }
  }
