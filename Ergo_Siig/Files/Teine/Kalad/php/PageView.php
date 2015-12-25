<?php
/**
 * 
 * @author ergos
 *
 */
class PageView
{
	/**
	 * this function builds the page
	 * @access public
	 * @author Ergo
	 * @param string $parameters['title'] shows title
	 * @param string $parameters['body'] shows body
	 */
	public static function buildPage($parameters)
	{
		//See jutt on kopeeritav ja samasugune
		require_once 'HTML/Template/IT.php';
		//ise tuleb kataloogi aadress paika panna
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		//siia tuleb fail millesse teeb - 
		$tpl->loadTemplatefile('page.html');
		
		$tpl -> setCurrentBlock('page');
		$tpl -> setVariable (array(
				'TITLE' => $parameters['title'],
				'BODY'  => $parameters['body']
		));
		$tpl-> parse ('page');
		return $tpl-> get('page');
	}
}