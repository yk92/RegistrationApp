<?php

  class addInstController extends controller {
  
    public function get() {
      
      $form = new addInstForm;
      $form_html = $form->getHTML();
      $this->html .= $form_html;
    }

    public function post() {
      
      $db = dbConn::getConnection();

      $qry = $db->prepare('INSERT INTO Instructors VALUES (:Lname, :Fname, :DeptID, :Office, :Phone, :Email)');

      try {
        
	$qry->execute( array( ':Lname'=>$_POST['Lname'],
			      ':Fname'=>$_POST['Fname'],
			      ':DeptID'=>$_POST['DeptID'],
			      ':Office'=>$_POST['Office'],
			      ':Phone'=>$_POST['Phone'],
			      ':Email'=>$_POST['Email']) );
      }

      catch (PDOException $e) {
        echo $e->getMessage();
      }
    
      header('Location: index.php?controller=editInstController');
    }
  }
