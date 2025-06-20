<?php

function get_var(string $var): ?string {
    return filter_input(INPUT_GET, $var, FILTER_SANITIZE_STRING);
}

$file = "adjectives.txt";

$lines1 = count(file($file));
$lines = file( $file );
$it = $lines[rand(0,$lines1)];

$file = "nouns.txt";
$lines1 = count(file($file));
$lines = file( $file );

if (get_var("importantnouns")) {
    if (rand(1,3) == '1') {
        $it2 = $_GET['importantnouns'];
    }
    else {
        $it2 = $lines[rand(0,$lines1)];
    }
} else {
    $it2 = $lines[rand(0,$lines1)];
}

$file = "numbers.txt";
$lines1 = count(file($file));
$lines = file($file);
$it3 = $lines[rand(0,$lines1)];

if (get_var('gm') == '2') {
    $stuff = $it . $it2;
} else {
    $stuff = $it . $it2 . $it3;
}

$final = get_var('prefix') . preg_replace('/\s+/','',$stuff) . get_var('suffix');
if (!$final) {
    header( 'Location: ?mk=1' ) ;
}

echo $final;
