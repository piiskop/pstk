<?php

require_once dirname(__FILE__) . '/../settingsPHP/settings.php';
/**
 * Class for elements
 * @author Eleri<eleri.apsolon@gmail.com>
 */
class obj
{

    /**
     * 
     * @access private
     * @author Eleri<eleri.apsolon@gmail.com>
     * @var string class name
     */
    private $className = 'open menu';

    /**
     * Getter for getting class name
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @return string class name
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Setter for setting class name
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @return string class name
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

}

$newObject = new obj();
/**
 * function for adding class name
 * @author Eleri<eleri.apsolon@gmail.com>
 * @param obj $elem element 
 * @param string $cls new probably additional class name
 */
function addClass($elem, $cls)
{
    $a = explode(" ", $elem->getClassName());

    //mixed array_search ( $needle , array $haystack [, bool $strict = false ] )

    if (array_search($cls, $a, true) === false) {

        $a[] = $cls;
    }
    $elem->setClassName(implode(" ", $a));
}

addClass($newObject, 'new'); // obj.className='open menu new'
addClass($newObject, 'open'); // no changes (class already exists)
addClass($newObject, 'me'); // obj.className='open menu new me'
echo "<pre>";
echo $newObject->getClassName($newObject);
echo "</pre>";
?>
