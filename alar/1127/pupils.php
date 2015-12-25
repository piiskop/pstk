<?php
/**
 * This code echoes the $pupils array for JSON
 * @author Alar Aasa <alar@alaraasa.ee>
 *
 */

$pupils = [
    [
        'firstName' => 'kaire',
        'lastName' => 'ojastu'
    ],
    [
        'firstName' => 'raiko',
        'lastName' => 'ojaste'
    ],
    [
        'firstName' => 'eleri',
        'lastName' => 'apsolon'
    ],
    [
        'firstName' => 'sander',
        'lastName' => 'mets'
    ],
    [
        'firstName' => 'maarika',
        'lastName' => 'erika'
    ],
    [
        'firstName' => 'kristen',
        'lastName' => 'aeg'
    ],
    [
        'firstName' => 'keijo',
        'lastName' => 'palts'
    ],
    [
        'firstName' => 'ingmar',
        'lastName' => 'nurmiste'
    ],
    [
        'firstName' => 'ženja',
        'lastName' => 'fokin'
    ]
];

echo json_encode($pupils, JSON_FORCE_OBJECT);


?>