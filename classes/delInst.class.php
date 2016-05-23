<?php

  class delInst {
    // delete the instructor from list of instructors and delete his name from taught classes.
    //before deleting him use the Lname Fname and DeptID of his to then access his sections and delete his names from them
    //set the sections to TBD instead
    public function get(){
      
      $email = $_REQUEST['inst'];

      $db = dbConn::getConnection();

      $qry = $db->prepare('SELECT Lname, Fname, DeptID FROM Instructors WHERE Email = :email');
    
      try {$qry->execute( array(':email'=>$email ) );}
    
      catch(PDOException $e){
        echo $e->getMessage();
      }

      $result = $qry->fetchAll(PDO::FETCH_ASSOC);

      //Update the instructor from Sections with TBD
      $qry = $db->prepare("UPDATE Sections SET InstrLname = 'TBD', InstrFname = 'TBD' WHERE InstrLname = :Lname and
      InstrFname = :Fname");
      
      try{
        $qry->execute( array( ':Lname'=>$result[0]['Lname'],
      			    ':Fname'=>$result[0]['Fname']) );
      }

      catch(PDOException $e){
        echo $e->getMessage();
      }

      //Delete the instructor from Instructors
     $qry = $db->prepare('DELETE FROM Instructors WHERE Lname = :Lname and Fname = :Fname');
     
     try {
       $qry->execute( array(':Lname'=>$result[0]['Lname'],
       			    ':Fname'=>$result[0]['Fname']) );
     }

     catch( PDOException $e ) {
       echo $e->getMessage();
     }


      header('Location: index.php?controller=editInstController');
    }
  }
