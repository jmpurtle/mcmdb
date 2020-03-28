<?php
namespace Magnus {
	spl_autoload_register(function ($className) {

		$classMap = array();

		if (isset($classMap[$className])) {
			require_once __DIR__ . $classMap[$className] . '.php';
		}

		// Alternatives
		$className  = str_replace("\\", '/', $className);

		if (file_exists(__DIR__ . '/' . $className . '.php')) {
			require_once __DIR__ . '/' . $className . '.php';
		} else if (file_exists(dirname(__DIR__) . '/' . $className . '.php')) {
			require_once dirname(__DIR__) . '/' . $className . '.php';
		} else if (file_exists(__DIR__ . '/api/' . $className . '.php')) {
			require_once __DIR__ . '/api/' . $className . '.php';
		}
		
	});
}