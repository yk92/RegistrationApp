<?php

  class homepageController extends controller {
    
    public function get() {
    
      session_start();
      $this->html .= '<img src="images/homepagePic.jpg" height="675" width="1450" alt="Homepage pic">';
    
    }

    public function post() {
          
    }

    public function put() {
    
    }

    public function delete() {
    
    }
  }
