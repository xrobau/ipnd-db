<?php

include "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = Setup::createXMLMetadataConfiguration([ __DIR__."/config" ], true);

$conn = [ 'driver' => 'pdo_sqlite', 'path' => __DIR__ . '/db.sqlite' ];

$em = EntityManager::create($conn, $config);
