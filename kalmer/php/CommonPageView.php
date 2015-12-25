<?php
class CommonPageView
{

	/**
	 * This function builds the whole page.
	 * 
	 * @access public
	 * @author kalmer
	 * @param string[string] $parameters['middle'] the middle part of the
	 * 		content of the page
	 * @return string
	 */
	public static function buildPage($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$templateForBody = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$templateForBody->loadTemplatefile('html.html');

		$html = '';

		require_once 'HeaderView.php';
		$html .= HeaderView::buildHeader();

		$html .= $parameters['middle'];

		require_once 'FooterView.php';
		$html .= FooterView::buildFooter();

		$templateForBody->setCurrentBlock('html');
		$templateForBody->setVariable    (array (
			'BODY' => $html
		));
		$templateForBody->parse          ('html');
		return $templateForBody->get('html');
	}

}