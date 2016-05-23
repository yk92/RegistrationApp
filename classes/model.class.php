<?php
  
  abstract class model {
    
    private $id;

    public function __construct(){
      //start session
      session_start();
      if(isset($oldID)){//the entire if clause is new code
        $this->id = $oldID;
      }
      else{
        $this->id = uniqid();//from here is the old way
        $_SESSION["id"][] = $this->id;
      }
    }
    
    //save function to save the data to session array
    public function save(){
      session_start();
      if(isset($oldID)){
        $_SESSION[$oldID] = (array) $this;
      }
      else
        $_SESSION[$this->id] = (array) $this; //cast class into array
    }
    
  }




