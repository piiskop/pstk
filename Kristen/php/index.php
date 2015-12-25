<?php
namespace pearphpvaade;
require_once dirname(__FILE__).'/pearbs/settings.php';
/**
 * kontrolleri klass
 * @author kristen <seppkristen@gmail.com>
 * @namespace pearphpvaade
 *
 */
class Controller {
	/**
	 * funtsioon mis võtab sisse sumview faili 
	 * @author kristen <seppkristen@gmail.com>
	 * @access public
	 * @uses SumView kasutab selles oleva klassi funktsiooni
	 */
	public static function start(){
		if (isset($_GET['value1'])){
			$value1=$_GET['value1'];
		}else{
			$value1=0;
		}
		if (isset($_GET['value2'])){
			$value2=$_GET['value2'];
		}else{
			$value2=0;
		}
		require_once dirname (__FILE__).'/pearbs/SumModel.php';
		$summa = SumModel::add($value1, $value2);
		
		require_once dirname ( __FILE__ ).'/pearbs/SumView.php';
		SumView::joonistaVormSiia($value1, $value2, $summa);
	}
}
Controller::start();