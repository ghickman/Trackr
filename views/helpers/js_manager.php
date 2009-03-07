<?php   
class JsManagerHelper extends AppHelper {     
     var $helpers = array('Javascript');
     
     //where's our jQuery path relevant to CakePHP's JS dir?
     var $_jqueryPath = 'jquery';
     
     //where do we keep our page/view relevant scripts?
     var $_pageScriptPath = 'page_specific';
  
     function myJs() {  
         return $this->Javascript->link(
             $this->_jqueryPath . '/' . 
             $this->_pageScriptPath . '/' . 
             $this->params['controller'] . '_' . 
             $this->params['action'], false);  
     }  
} 
?>