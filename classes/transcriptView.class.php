<?php

  class transcriptView extends view {
    
    //Going to be a view for the student's transcript.
    //Importing Sid from SESSION and using for 2 Queries.

    //Need to add a Welcome screen with Student personal information

    //2nd screen will have all courses from the join operation.
    public function getHTML() {
    
      session_start();
      $sid = $_SESSION['Sid'];

      $db = dbConn::getConnection();

      $qry = $db->prepare('SELECT Lname, Fname FROM Students WHERE Sid = :Sid');
      $qry->execute( array( ':Sid'=>$sid ) );

      $results = $qry->fetchAll(PDO::FETCH_ASSOC);
      foreach ($results as $result) {
      
        
      }
      
      
      return $this->html;
    }
  }
