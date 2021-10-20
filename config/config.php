<?php

/**
 * author : Ronan Aupetit
 *
 * Endroit ou définir la config par défaut de l'application comme les différents chemins, les accès à la bdd, etc
 * la variable $appConfig peut être modifier dans le fichier customConfig.php (fichier à créer en se basant sur la
 * template car pas versionné la variable $appConfig sera implémentée dans le container de dépendances et accessible
 * via la clé 'app_config'
 */

$config = [
	'modules' => [],
	'database' => [
		'driver' => '', // valeurs possibles : mysql, pgsql, sqlite, sqlite2, ...
		'name' => '',
		'host' => '',
		'username' => '',
		'password' => ''
	],
	'binance_api' => [
		'test_mode' => false
	]
];