<?php

namespace summa;

/**
 * class which describes calculator view
 * 
 * @author Kristine <Kristinesepp@gmail.com>
 * @namespace summa
 */
class SumView {
	/**
	 * Function to build view
	 *
	 * @access public
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @param number $parameters['a'] first summand
	 * @param number  $parameters['b'] second summand
	 * @param number $parameters['sum'] sum        
	 */
	public static function buildView($parameters) {
		require_once "HTML/Template/IT.php";
		
		$tpl = new \HTML_Template_IT ( dirname ( __FILE__ ) . "/" );
		
		$tpl->loadTemplatefile ( "HArjutus.html", true, true );
		$tpl->setCurrentBlock ( "form" );
		$tpl->setVariable ( array (
				'URL-BEGIN' => BEGINNING_OF_URL,
				'SUMMAND' => $parameters['a'],
				'SUMMAND2' => $parameters['b'],
				'SUM'=> $parameters['sum'],
		) );
		$tpl->parseCurrentBlock ( "form" );
		
		$tpl->show ();
	}
}


