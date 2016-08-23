<?php

// Guzzle Dependency
require_once(dirname(__FILE__) . '/lib/guzzle/autoloader.php');

// Horntell Errors
require_once(dirname(__FILE__) . '/src/Horntell/Errors/Error.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/InvalidRequestError.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/AuthenticationError.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/ForbiddenError.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/NetworkError.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/NotFoundError.php');
require_once(dirname(__FILE__) . '/src/Horntell/Errors/ServiceError.php');


// Horntell Http Client
require_once(dirname(__FILE__) . '/src/Horntell/Http/Request.php');
require_once(dirname(__FILE__) . '/src/Horntell/Http/Response.php');


// Horntell Entities
require_once(dirname(__FILE__) . '/src/Horntell/App.php');
require_once(dirname(__FILE__) . '/src/Horntell/Campaign.php');
require_once(dirname(__FILE__) . '/src/Horntell/Card.php');
require_once(dirname(__FILE__) . '/src/Horntell/Horn.php');
require_once(dirname(__FILE__) . '/src/Horntell/Profile.php');

