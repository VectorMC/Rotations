<?php

header('Content-Type: text/plain');

$files = scandir("servers");

foreach ($files as $name) {
	$lowercase = strtolower($name);

	if (endsWith($lowercase, ".yml")) {
		print_r(str_replace(".yml", "", $name) . "\n");
	}
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

?>
