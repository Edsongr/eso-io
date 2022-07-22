<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../../vendor/autoload.php';

use Edsongr\ESOIO\Notify\Notify;
use Edsongr\ESOIO\Notify\InternalNotify;

$title      = $_POST['title'] ?? '';
$message    = $_POST['message'] ?? '';
$song       = $_POST['song'] ?? false;
$pulse      = $_POST['pulse'] ?? false;
$typeNotify = $_POST['typeNotify'] ?? '';
$receivers  = $_POST['receivers'] ?? '';

$notify = new Notify(new InternalNotify);
$notify->setReceiver($receivers);
$notify->setTitle($title);
$notify->setMessage($message);
$notify->setSong($song);
$notify->setPulse($pulse);
$notify->setTypeAlert($typeNotify);
$result = $notify->sendNotify();


$_SESSION['result'] = $result;

header("Location: index.php");