<?php

require_once '../settings.php';
require_once ROOT_FOLDER . 'MVC/Controller/MainController.php';

\MVC\Controller\MainController::start($_GET, $_POST);