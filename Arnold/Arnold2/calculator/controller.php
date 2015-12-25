<?php
namespace pstk;
require_once dirname(__FILE__).'/../settingsPHP/settings.php';

class Controller
{

    public static function run()
    {
        require_once dirname(__FILE__) . '/model.php';
        $sum = Calculator::calculate();
        require_once dirname(__FILE__) . '/view.php';
        CalculatorView::build($sum, Calculator::getFirstVariable(), Calculator::getSecondVariable());
    }

}

Controller::run();