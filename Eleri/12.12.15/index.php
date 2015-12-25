<?php

require_once dirname(__FILE__). '/configuration.php';

class Controller {
    public static function start() {
        //seos vaatele
        require_once dirname(__FILE__). '/participationView.php';
        echo dogshow\participationView::buildRegistrationForm();
    }
}
Controller::start();