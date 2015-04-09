<?php

header('Content-Type: text/plain');

$query = strtolower($_GET["query"]);
$files = scandir("servers");

if (strlen($query) > 0) {
	foreach ($files as $name) {
		$lowercase = strtolower($name);

		if (startsWith($lowercase, $query)) {
			print_r(file_get_contents("servers/" . $name));
			return;
		}
	}
}
else {
	echo "Error: Query parameter not provided.";
	return;
}
echo "Error: Rotation not found.";

function startsWith($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

?>