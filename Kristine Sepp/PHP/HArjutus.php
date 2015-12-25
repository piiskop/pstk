<?php
require_once dirname ( __FILE__ ) . '/settings.php';
/**
 * test class
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 *        
 */
class User {
}

$user = new User ();

$user->name = 'John';

$user->name = 'Serge';

echo '<pre>';
var_dump ( $user );
echo '</pre>';

unset ( $user->name );

echo '<pre>';
var_dump ( $user );
echo '</pre>';

/**
 * describe menu elements
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 *        
 */
class Menu {
	/**
	 *
	 * @access private
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @var string width of element
	 *     
	 */
	private $width = '200';
	/**
	 *
	 * @access private
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @var string heigth of element
	 *     
	 */
	private $height = '300';
	/**
	 *
	 * @access private
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @var string title of element
	 *     
	 */
	private $title = 'My menu';
}

$menu = new Menu ();

/**
 * function which multiplies all numeric properties by 2
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 * @param Object $object
 *        	the object
 */
function multiplyNumeric($object) {
	echo '<pre>';
	var_dump ( $object );
	echo '</pre>';
	foreach ( $object as $property => $val ) {
		echo '37';
		if (is_numeric ( $val )) {
			$object->$property = $val * 2;
			echo $val;
		}
	}
}

multiplyNumeric ( $menu );

echo '<pre>';
var_dump ( $menu );
echo '</pre>';
