<?php
$config = require_once 'config.php';
require_once 'functions.php';
require_once 'Database.php';

$db = new Database($config['database']);

require 'router.php';

