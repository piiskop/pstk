<?php
/**
 * This class describes the visual part of the footer.
 * 
 * @author kalmer
 */
class FooterView
{

	/**
	 * This function builds the footer.
	 * 
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public static function buildFooter()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('footer.html');
		$tpl->touchBlock('footer');
		$tpl->parse('footer');
		return $tpl->get('footer');
	}

}
