<?php

namespace summa;

/**
 * This is the common view class.
 *
 * @author arnold:tserepov<tserepov@gmail.com>
 * @namespace summa
 *           
 */
class CalculatorView {
	/**
	 * This function raises the error as a callback function for views.
	 *
	 * @access public
	 * @author Kalmer Piiskop
	 * @param object $errorFromOutside
	 *        	the error object
	 */
	public static function raiseError($errorFromOutside) {
		echo ' 25: ', $errorFromOutside->getDebugInfo ();
		echo ' 26: ', $errorFromOutside->getMessage ();
		exit ();
	}
	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @param string $parameters['body']
	 *        	the body
	 * @param string $parameters['title']
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 *      
	 */
	public static function buildView($parameters) {
		require_once 'HTML/Template/IT.php'; // //////////////////////////////////////////////////////
		\PEAR::setErrorHandling ( PEAR_ERROR_CALLBACK, array (
				new CalculatorView (),
				'raiseError' 
		) );
		$tpl = new \HTML_Template_IT ( ROOT_FOLDER . 'htmlcalculator' ); // /////////////////////////////
		echo ' 29: ', ROOT_FOLDER;
		$tpl->loadTemplatefile ( 'calculator.html' );
		$tpl->setCurrentBlock ( 'html' );
		$tpl->setVariable ( array (
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'SUMMA1'=>$parameters['summa1'],
				'SUMMA2'=>$parameters['summa2'],
				'RESULT'=>$parameters['result'] 
		) );
		$tpl->parse ( 'html' );
		echo $tpl->get ( 'html' );
	}
}