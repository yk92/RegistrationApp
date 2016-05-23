<?php

  class editStudController extends controller {
  
    public function get() {
      
      //list out all of the instructors in a table and add or delete instructors. Just like carView table

      $view = new studEditView;
      $view_html = $view->getHTML();
      $this->html .= $view_html;
    }

    public function post() {
      
      //drop students function gets implemented here. 

      //I am not quite sure what I should do with this. I assume it is to drop students from certain classes but I am not sure how to do this
    }
  
  }
