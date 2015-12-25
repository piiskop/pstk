<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once dirname(__FILE__) . '/../settingsPHP/settings.php';

        /**
         * Class for elements
         * @author arnold tserepov<arnoldtserepov@gmail.com>
         */
        class obj
        {

            /**
             * 
             * @access private
             * @author arnold tserepov<arnoldtserepov@gmail.com>
             * @var string class name
             */
            private $className = 'open menu veel asju';

            /**
             * Getter for getting class name
             * @access public
             * @author arnold tserepov<arnoldtserepov@gmail.com>
             * @return string class name
             */
            public function getClassName()
            {
                return $this->className;
            }

            /**
             * Setter for setting class name
             * @access public
             * @author arnold tserepov<arnoldtserepov@gmail.com>
             * @return string class name
             */
            public function setClassName($className)
            {
                $this->className = $className;
            }

        }
        /**
         * function removes class
         * @param type $obj
         * @param type $cls
         */
        function removeClass($obj, $cls) {
            $classes = explode(" ", $obj->getClassName());
            
            if(array_search($cls, $classes, true ) !== false) {
               unset($classes[array_search($cls, $classes, true)]);
              //  var_dump(array_splice($classes,1,1));
                $obj->setClassName(implode(" ", $classes));
                
                
            }
        }
        $obj = new obj;
        
            $a = removeClass($obj, 'open'); // obj.className='menu'
            $b = removeClass($obj, 'blabla');  // no changes (no class to remove)
            echo $obj->getClassName();
        
        ?>
    </body>
</html>
