<?php

  class registerController extends controller {
  
    public function get() {
      
      //list out all of the instructors in a table and add or delete instructors. Just like carView table

      $view = new registerView;
      $view_html = $view->getHTML();
      $this->html .= $view_html;
    }

    public function post() {
    
    }
  
  }
