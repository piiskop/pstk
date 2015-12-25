<?php
namespace dogshow;

class ParticipationView {
	public static function buildRegistrationForm($parameters) {
		$exhibitions = [];
		foreach ($parameters['exhibitions'] as $idExhibition => $exhibition) {
			// @formatter:off
			$rowOfExhibition = sprintf(
				'%1$u: %2$s (%3$s)',
				$exhibition->getId(), // 1
				$exhibition->getLocation(), // 2
				$exhibition->getTimestamp() // 3
			);
			// @formatter:on
			$exhibitions[] = $rowOfExhibition;
		}
		return 'regamisvorm<br/>' . implode('<br/>', $exhibitions);
	}
	public static function buildMessage($parameters) {
		// @formatter:off
		return sprintf(
			'Koer %1$s regatud näitusele kohas %2$s.',
			$parameters['dog']->getBreed(), // 1
			$parameters['exhibition']->getLocation() // 2
		);
		// @formatter:on
	}
	public static function buildErrorMessage() {
		return 'Milline näitus?';
	}
}