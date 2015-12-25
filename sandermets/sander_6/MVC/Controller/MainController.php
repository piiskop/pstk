<?php

namespace MVC\controller;

use MVC\View\MainView as View;
use MVC\Model\Pupils;

//use Exception;

/**
 * Description of MainController
 *
 * @author sander
 */
class MainController
{

    /**
     * required files and data init
     */
    private static function init()
    {
        require_once ROOT_FOLDER . 'MVC/Model/Pupil.php';
        require_once ROOT_FOLDER . 'MVC/Model/Pupils.php';
        require_once ROOT_FOLDER . 'MVC/View/MainView.php';
        Pupils::init();
    }

    /**
     * start point
     * 
     * @param type $paramsGET
     * @param type $paramsPOST
     */
    public static function start($paramsGET, $paramsPOST)
    {
        self::init();
        $hidePHPsearch = '';
        $name = '';
        $r = (object) [
                    'steps' => 0,
                    'id' => -1,
        ];
        if (isset($paramsGET['runTESTS'])) {
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode(Pupils::runTESTS());
        } else if (isset($paramsPOST['name'])) {
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode($paramsPOST);
        } else if (isset($paramsGET['get'])) {
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode(Pupils::DATA());
        } else if (isset($paramsGET['name'])) {
            header('Content-type: text/html; charset=utf-8');
            $r = Pupils::SearchBinaryByProperty($paramsGET['name'], 'name');
            $hidePHPsearch = 'class="hide"';
            $name = $paramsGET['name'];
            echo View::buildHTMLView($r, $hidePHPsearch, $name);
        } else {
            header('Content-type: text/html; charset=utf-8');
            echo View::buildHTMLView($r, $hidePHPsearch, $name);
        }
    }

}
