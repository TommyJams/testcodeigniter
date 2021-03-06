<?php

    /**************************************************************************/
    /**************************************************************************/

    class Template
    {
        /**********************************************************************/
        
        function __construct($data='',$path='')
        {
            $this->data=$data;
            $this->path=$path;
        }
        
        /**********************************************************************/

        public function output()
        {
            ob_start();
            include($this->path);
            return(ob_get_clean());
        }
        
        /**********************************************************************/
    }
    
    /**************************************************************************/
    /**************************************************************************/
?>
