<?php
/**
 * this class visualizes view
 *
 * @author tambet
 *        
 */
class PageView {
	/**
	 * this function builds the page
	 *
	 * @access public
	 * @author tambet
	 * @param string $prameters['title']
	 *        	shows-title
	 * @param string $prameters['body']
	 *        	shows-body
	 */
	public static function buildPage($prameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('page.html');
		$tpl->setCurrentBlock('page');
		$tpl->setVariable(array (
			'TITLE' => $prameters['title'],
			'BODY' => $prameters['body'] 
		));
		$tpl->parse('page');
		
		return $tpl->get('page');
	}
}