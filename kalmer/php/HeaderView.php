<?php
/**
 * This class describes the visual part of the header.
 * 
 * @author kalmer
 */
class HeaderView
{

	/**
	 * This function builds the header.
	 * 
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public static function buildHeader()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('header.html');
		$tpl->touchBlock('header');
		$tpl->parse('header');
		return $tpl->get('header');
	}

}
