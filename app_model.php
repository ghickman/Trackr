<?php
class AppModel extends Model {
    
    /**
     * Controller beforeFilter callback.
     * Called before the controller action. 
     * 
     * @return void
     */
    function beforeFilter() {
        if(env('HTTP_HOST') == Configure::read('env.dev')) {
            $useDbConfig = 'development';
        } elseif(env('HTTP_HOST') == Configure::read('env.prod')) {
            $useDbConfig = 'production';
        }
    }
    
}
?>