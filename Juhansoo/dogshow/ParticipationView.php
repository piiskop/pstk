<?php
namespace dogshow;

/**
 * This method sets the participation view.
 *
 * @author Rasmus <juhansoo12@gmail.com>
 * @namespace dogshow
 */
class ParticipationView {
	
	public static function buildRegistrationForm($parameters) {
		$exhibitions = [];
		//lammutan $parameters massiivis kohal exhibitions oleva alamassiivi kahte tulpa (indeksid jäävad vasakule, paremale väärtused)
		foreach ($parameters['exhibitions'] as $idExhibition => $exhibition) {
			//võtame kõik näitused ja tekitame read
			//formatter:off
			$rowOfExhibitions = sprintf(
				'%1$u: %2$s (%3$s)',
				$exhibition->getId(),
				$exhibition->getLocation(),
				$exhibition->getTimestamp()
			);
			//formatter:on
			$exhibitions[] = $rowOfExhibitions;
		}
		//kirjutame kõik näitused välja massiivist
		return 'regamisvorm<br/>'.implode('<br/>', $exhibitions);
	}
	
	public static function buildMessage($parameters) {
		//formatter:off
		return sprintf(
			'Koer %1$s regatud näitusele kohas %2$s.',
			//määran, millist sisendargumenti kasutan
			$parameters['breed']->getBreed(),
			$parameters['location']->getLocation()
		);
		//formatter:on
	}
	
	public static function buildErrorMessage() {
		return 'Id peab olema määratud.';
	}
}