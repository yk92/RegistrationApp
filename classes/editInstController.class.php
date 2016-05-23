<?php

  class editInstController extends controller {
  
    public function get() {
      
      //list out all of the instructors in a table and add or delete instructors. Just like carView table

      $instView = new instEditView;
      $view_html = $instView->getHTML();
      $this->html .= $view_html;
    }

    public function post() {
    
    }
  
  }
