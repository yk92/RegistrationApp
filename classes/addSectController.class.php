<?php

  class addSectController extends controller {
    
    public function get() {
      
      $form = new addSectionForm;
      $form_html = $form->getHTML();
      $this->html .= $form_html;
    }

    public function post() {
      print_r($_POST); 
      //controller for adding a section into db

      $db = dbConn::getConnection();

      $stmt = $db->prepare('INSERT INTO Sections VALUES (:Term, :SectionNum, :Cno, :InstrLname, :InstrFname, :Room, :Days, :StartTime, :EndTime, :Capacity)');
      
      try { $stmt->execute( array( ':Term'=>$_POST['Term'],
      			     ':SectionNum'=>$_POST['Section'],
			     ':Cno'=>$_POST['Cno'],
			     ':InstrLname'=>$_POST['Lname'],
			     ':InstrFname'=>$_POST['Fname'],
			     ':Room'=>$_POST['Room'],
			     ':Days'=>$_POST['Days'],
			     ':StartTime'=>$_POST['StartTime'],
			     ':EndTime'=>$_POST['EndTime'],
			     ':Capacity'=>$_POST['Capacity']) ); }
      catch(PDOException $e) {
        echo $e->getMessage();
      }

      //header('Location: index.php?controller=adminController');

    }

    public function put() {
    
    }

    public function delete() {
    
    }
  }
