<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($argc != 3) {
    echo getHelp($argv);
    die();
}

$day = $argv[1];
$puzzle = $argv[2];

$day = ucfirst(strtolower($day));
$puzzle = ucfirst(strtolower($puzzle));

$class = "\\$day\\$puzzle";

$runner = new $class();
$runner();

function getHelp($argv)
{
    $progName = $argv[0];
    return <<<EOHELP

php $progName DayN PuzzleN


EOHELP;

}
