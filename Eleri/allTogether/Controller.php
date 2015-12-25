<?php

namespace pupilsearch;

class Controller
{

    /**
     * required files and data init
     */
    private static function setUp()
    {
        require_once dirname(__FILE__) . '/Model.php';
        require_once dirname(__FILE__) . '/Pupil.php';
        require_once dirname(__FILE__) . '/PupilView.php';

        Pupil::init();
//
    }

    /**
     * Run mvc
     * Also does routing
     * 
     * @param array $parGET
     * @param array $parPOST
     */
    public static function start($parGET, $parPOST)
    {
        self::setUp();
//        Pupil::TEST();
        $route = '';

        if (array_key_exists('fname', $parGET)) {
            $route = 'searchPHP';
        }

        switch ($route) {
            case 'searchPHP':
                $r = Pupil::searchByName($parGET['fname']);
                $r['name'] = $parGET['fname'];
//                print_r($r);
                echo PupilView::buildView($r);
                break;

            default:
                echo PupilView::buildView();
                break;
        }
    }

}
