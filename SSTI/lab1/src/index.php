<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$input = $_GET['search'] ?? '';


if (!empty($input)) {
    $template = $twig->createTemplate("<h2>Search key: <h1>$input</h1></h2>");
    echo $template->render(['input' => $input]);
}
echo $twig->render('index.twig');

