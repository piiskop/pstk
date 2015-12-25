<?php
//Klassi nimi suure algustähega
/**
 * This class visualize familys
 * @author Ergo
 *
 */
class FamilyView
{
	//ülessanne on kogu nimekiri kokku panna ja see kohahoidatesse  paigutada
	/**
	 * This function
	 * @access public
	 * @author Ergo
	 * @param int|string:Family[int] $parameters
	 */
	public static function buildList($parameters)
	{
		//See jutt on kopeeritav ja samasugune
		require_once 'HTML/Template/IT.php';
		//ise tuleb kataloogi aadress paika panna
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		//siia tuleb fail millesse teeb
		$tpl->loadTemplatefile('familys.html');
		$list= '';
		//siin luuakse massiiv muutujaga family
		foreach($parameters['familys'] as $idFamily=> $family)
		{
			//Siin reas on punkt ja võrdus et lisada
			$list .= FamilyView::buildListItem(array(
					'family' => $family
			));
		}
		$tpl-> setCurrentBlock('familys');
		$tpl-> setVariable (array(
				'LIST' => $list
		));
		$tpl	   -> parse ('familys');
		return $tpl-> get('familys');
		
	}
	/**
	 * @access public
	 * @author Ergo
	 * @param int|string: Family $parameters[string]
	 * @return string
	 */
	public static function buildListItem($parameters)
	{
		//See jutt on kopeeritav ja samasugune
		require_once 'HTML/Template/IT.php';
		//ise tuleb kataloogi aadress paika panna
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		//siia tuleb fail millesse teeb
		$tpl->loadTemplatefile('familys.html');
		//familis.html failist esimene block
		$tpl -> setCurrentBlock ('row-of-familys');
		$tpl -> setVariable (array(
				'BEGINING-OF-URL' => BEGINING_OF_URL,
				'ID-FAMILY'       => $parameters ['family']-> getIdFamily(),
				'FAMILY-NAME'     => $parameters ['family']-> getName(),
			
		));
		//sõelume faili?
		$tpl 		-> parse ('row-of-familys');
		return $tpl -> get('row-of-familys');
	}
	/**
	 * @ access public
	 * author Ergo
	 * @param int|string:Family: $parameters
	 */
	public static function buildFamilyView($parameters)
	{
		//See jutt on kopeeritav ja samasugune
		require_once 'HTML/Template/IT.php';
		//ise tuleb kataloogi aadress paika panna
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		//siia tuleb fail millesse teeb
		$tpl->loadTemplatefile('familys.html');
		
		require_once dirname(__FILE__) . '/FamilyView.php';
		
		$tpl -> setCurrentBlock ('family');
		$tpl -> setVariable (array(
				'NAME' 					 => $parameters['family']-> getName(),
				'BEGINING-OF-URL-FAMILY' => BEGINING_OF_URL
		));
		$tpl 		-> parse ('family');
		return $tpl -> get('family');
	}
}