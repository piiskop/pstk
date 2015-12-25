<?php

/**
 * 
 */
$pupils = array(
    array(
        "firstName" => "kaire",
        "lastName" => "ojastu",
        "canCode" => true
    ),
    array(
        "firstName" => "raiko",
        "lastName" => "ojaste",
        "canCode" => false
    ),
    array(
        "firstName" => "eleri",
        "lastName" => "apsolon",
        "canCode" => false
    ),
    array(
        "firstName" => "sander",
        "lastName" => "mets",
        "canCode" => false
    ),
    array(
        "firstName" => "maarika",
        "lastName" => "erika",
        "canCode" => false
    ),
    array(
        "firstName" => "kristen",
        "lastName" => "aeg",
        "canCode" => true
    ),
    array(
        "firstName" => "keijo",
        "lastName" => "palts",
        "canCode" => false
    ),
    array(
        "firstName" => "ingmar",
        "lastName" => "nurmiste",
        "canCode" => true
    ),
    array(
        "firstName" => "ženja",
        "lastName" => "fokin",
        "canCode" => false
    )
);


header('Content-Type: application/json');


$result = [];
if (count($_POST) > 0) {
    $result['success'] = true;
    $result['data'] = $_POST;
    echo json_encode($result);
} else {
    $pupilsJSON = json_encode($pupils);
    echo $pupilsJSON;
}

