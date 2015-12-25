<?php
namespace dog;
class participationView{
	public static function buildRegistrationForm($parametrs){
		foreach($parametrs['exhibitions'] as $idExhibitions=>$exhibition){
			//@formatter:off
			$rowExhibition=sprintf(
					'%1$u: %2$s (%3$s)',
					$exhibition->getId(),//1
					$exhibition->getLocation(),//2
					$exhibition->getTimestamp() //3
					);
			//@formatter:off 
			/// ei treppi
			$exhibition[]=$rowExhibition;
		}
		return 'regamisvorm <br/>' . implode('<br/>',$exhibitions);
	}
}