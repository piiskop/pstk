<?php
class KaladeView
{
	public static function buildList($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('kalad.html');
		$list= '';
		//siin luuakse massiiv muutujaga family
		foreach($parameters['kalad'] as $idKalad => $kala)
		{
			//Siin reas on punkt ja võrdus et lisada
			$list .= KaladeView::buildListItem(array(
					'kalad' => $kala
			));
		}
		$tpl-> setCurrentBlock('kalad');
		$tpl-> setVariable (array(
				'LIST' => $list
		));
		$tpl	   -> parse ('kalad');
		return $tpl-> get('kalad');
		
	}
	
	public static function buildListItem($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('kalad.html');
		//familis.html failist esimene block
		$tpl -> setCurrentBlock ('row-of-familys');
		$tpl -> setVariable (array(
				'BEGINING-OF-URL' => BEGINING_OF_URL,
				'ID-KALAD'       => $parameters ['kalad']-> getIdKala(),
				'KALADE-NIMED'     => $parameters ['kalad']-> getNimi(),
			
		));
		//sõelume faili?
		$tpl 		-> parse ('row-of-familys');
		return $tpl -> get('row-of-familys');
	}

	public static function buildFamilyView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('familys.html');		
		require_once dirname(__FILE__) . '/KaladeView.php';
		
		$tpl -> setCurrentBlock ('family');
		$tpl -> setVariable (array(
				'NAME' 					 => $parameters['family']-> getName(),
				'BEGINING-OF-URL-FAMILY' => BEGINING_OF_URL
		));
		$tpl 		-> parse ('family');
		return $tpl -> get('family');
	}
}