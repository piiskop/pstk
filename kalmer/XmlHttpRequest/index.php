<?php
$content = array (
	'liens' => array (
		array (
			'target' => 'BIGBANK AS',
			'reference' => 'http://www.kuldnebors.ee/70576469'
		),
		array (
			'target' => 'DANSKE BANK A/ EESTI FILIAAL',
			'reference' => 'http://www.kuldnebors.ee/search/teated/mitmesugust/danske-bank-eesti-filiaal-tsiviilarest/search.mec?pob_post_id=50075507&pob_action=show_post&pob_cat_id=11019&pob_browser_offset=0&pob_view_language_id=et&search_evt=onsearch&search_O_string=danske'
		),
		array (
			'target' => 'TSIVIILARESTI SIHITIS DANSKE BANK A/S EESTI FILIAAL',
			'reference' => 'http://www.kuldnebors.ee/55975891'
		)
	)
);
if (isset($_POST['target'])) {
	$content['liens'][0]['target'] = $_POST['target'];
}
header('Content-type: application/json');
echo json_encode($content, JSON_FORCE_OBJECT);
