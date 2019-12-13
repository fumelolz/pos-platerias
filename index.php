<?php

require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once 'controllers/categories.controller.php';
require_once 'controllers/products.controller.php';
require_once 'controllers/clients.controller.php';


require_once "models/users.model.php";
require_once "models/categories.model.php";
require_once 'models/products.model.php';
require_once 'models/clients.model.php';

$template = new ControllerTemplate();
$template -> ctrTemplate();
