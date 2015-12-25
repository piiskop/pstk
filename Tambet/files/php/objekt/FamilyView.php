<?php
/**
 * this class visualizes familys
 *
 * @author tambet
 *        
 */
class FamilyView {
	/**
	 * this fuction builds family list
	 * @access public
	 * @author tambet
	 * @param int|string:Family[int] $parameters['familys'] Family list
	 * @return string
	 */
	public static function buildList($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('familys.html');
		$list = '';
		foreach ( $parameters['familys'] as $idFamily => $family ) {
			$list .= FamilyView::buildListItem(array (
				'family' => $family 
			));
		}
		$tpl->setCurrentBlock('familys');
		$tpl->setVariable(array (
			'LIST' => $list 
		));
		$tpl->parse('familys');
		return $tpl->get('familys');
	}
	/**
	 * this function shows one famyly in the list
	 * 
	 * @access private
	 * @author tambet
	 * @param int|string:Family $parameters['family']
	 *        	One family
	 * @return string
	 */
	private static function buildListItem($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('familys.html');
		{
		}
		$tpl->setCurrentBlock('row-of-familys');
		$tpl->setVariable(array (
			'BEGINING-OF-URL' => BEGINING_OF_URL,
			'ID-FAMILY' => $parameters['family']->getIdFamily(),
			'FAMILY-NAME' => $parameters['family']->getName() 
		));
		$tpl->parse('row-of-familys');
		return $tpl->get('row-of-familys');
	}
	/**
	 * building the family view
	 * @author juri
	 * @access public
	 * @param int|string:Family $parameters['family'] the family
	 * @return string
	 */
	public static function buildFamilyView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/');
		$tpl->loadTemplatefile('familys.html');
		
	require_once dirname(__FILE__) . '/FamilyView.php';

		$tpl->setCurrentBlock('family');
		$tpl->setVariable    (array (
			
			'NAME'     => $parameters['family']->getName(),
			'BEGINING-OF-URL-FAMILY'=>BEGINING_OF_URL
		));
		$tpl->parse          ('family');
		return $tpl->get('family');
	}
}


