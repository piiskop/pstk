<?php
namespace pearphpvaade;
/**
 * klass mis kirjeldab summavormi vaadet
 * @author kristen <seppkristen@gmail.com>
 * @namespace pearphpvaade
 */
class SumView {
	/**
	 * loob htmli vaate
	 * @author kristen <seppkristen@gmail.com>
	 * @access public
	 */
	public static function joonistaVormSiia($value1,$value2,$summa){
		require_once "HTML/Template/IT.php";
		$tpl = new \HTML_Template_IT ( dirname ( __FILE__ ) );
		
		$tpl->loadTemplatefile ( "sum.html", true, true );
		$tpl->setCurrentBlock ( "form" );
		$tpl->setVariable (array(
				'URLI-ALGUS'=>BEGINNING_OF_URL,
				'VALUE1'=>$value1,
				'VALUE2'=>$value2,
				'SUMMA'=>$summa
		));
		// parse outter block
		$tpl->parse ( "form" );
		// print the output
		$tpl->show ();
	}
}
?>