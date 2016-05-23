<?php

  class studEditCourseController extends controller {
  
    public function post() {
      
      //list out all of the instructors in a table and add or delete instructors. Just like carView table
      session_start();
      $_SESSION['Sid'] = $_POST['Sid'];
      $view = new transcriptView;
      $view_html = $view->getHTML();
      $this->html .= $view_html;
    }

    public function get() {
      //add / drop of course goes here
    }
  
  }
