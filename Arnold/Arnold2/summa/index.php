<?php

namespace summa;
require_once dirname (__FILE__).'/settings.php';
class Index{
	/**
	 * function start
	 * @ public
	 * @author arnold:tserepov<tserepov@gmail.com>
	 * @uses \summa\CalculatorView-builds view
	 */
	public static function start(){
		if(isset($_GET['first'])){
			$first=$_GET['first'];
		}
		else{
			$first=0;
		}
		if(isset($_GET['second'])){
			$first=$_GET['second'];
		}
		else{
			$second=0;
		}
		require_once dirname(__FILE__).'/view.php';
		\summa\CalculatorView::buildview(array(
				'summand1'=>($first),
				'summand2'=>($second),
				'summa'=>(+($first)+($second))
				
		
		));
	}
}
Index::start();
// echo '<pre>'; 
// var_dump($_GET);
// echo '</pre>';
// echo ($_GET['first']);
// echo ($_GET['second']);
// echo (+($_GET['first'])+($_GET['second']));

