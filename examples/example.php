<?php

require __DIR__ . '/../vendor/autoload.php';

use App\MailValidator;

if (!isset($argv[1])) {
    $mail = 'dorn993@mail.ru';
} else {
    $mail = $argv[1];
}

$validator = new MailValidator();

if($validator->validate($mail)) {
    echo "Email $mail is valid".PHP_EOL;
} else {
    echo "Email $mail is invalid".PHP_EOL;
}
