<?php
App::import('Helper', 'Session');

class MysessionHelper extends SessionHelper {
    // init
    var $__active = true;
   
    function __construct($base = null) {
        // copied from the parent SessionHelper
        if (!defined('AUTO_SESSION') || AUTO_SESSION === true) {
            parent::__construct($base, false);
        } else {
            $this->__active = false;
        }
    }
   
    /*
     * flash()
     * flashes a message on the screen with a coloured box indicating success, failure or normal
     */
    function flash() {
        // init
        $output = '';
       
        // get the flash msg array from the session
        $data = parent::read('flash');
       
        // data looks like this
        // $data = array('flash message', 'success');
       
        // delete the session variable
        parent::del('flash');
       
        // if the flash message is not empty
        if(!empty($data[0])) {
            // switch depending on flash type
            switch($data[1]) {
                case 'success':
                    // print out a div with a success class
                    $output .= '<div class="flash_success">';
                    break;
                case 'failure':
                    // print out a div with a failure class
                    $output .= '<div class="flash_failure">';
                    break;
                default:
                    // print out a default flash class
                    $output .= '<div class="flash">';
                    break;
            }
            // save the flash message with the closing div
            $output .= $data[0].'</div>';
        }
    return $output;
    }
}
?>