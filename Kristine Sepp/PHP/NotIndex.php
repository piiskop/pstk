<?php

namespace summa;

require_once dirname ( __FILE__ ) . '/settings.php';
/**
 * class front controller
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 * @namespace summa
 */
class Controller {
	/**
	 * Function start
	 * 
	 * @access public
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @uses \summa\SumView to build view
	 */
	public static function start() {
		echo '<pre>';
		var_dump ( $_GET );
		echo '</pre>';
		require_once dirname ( __FILE__ ) . '/Sum.php';
		$a = isset($_GET['a'])?$_GET['a']:0;
		$b = isset($_GET['b'])?$_GET['b']:0;
		$sum = Sum :: calculateSum(array(
				'a'=>$a,
				'b'=>$b
				));
		require_once dirname ( __FILE__ ) . '/SumView.php';
		
		
		\summa\SumView::buildView ( array (
				'a' => $a,
				'b' => $b,
				'sum' => $sum 
		) );
	}
}
Controller::start ();
