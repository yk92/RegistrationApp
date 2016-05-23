<?php

  class editSectController extends controller {
  
    public function get() {
      
      //list out all of the instructors in a table and add or delete instructors. Just like carView table

      $view = new sectEditView;
      $view_html = $view->getHTML();
      $this->html .= $view_html;
    }

    public function post() {
      
      // ********** this function is for deleting sections from the schedule. ***************

      /* this will affect:
      	 
	 Enrollments
	 Students GPA in Students table
      */

    }
  
  }
