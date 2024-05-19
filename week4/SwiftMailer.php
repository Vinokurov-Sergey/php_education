<?php
require_once 'vendor/autoload.php';
try {
    $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'SSL'))
        ->setUsername('serzhik.lu')
        ->setPassword('cyywgoasuwcgcxqp');
    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Hello, dude!'))
        ->setFrom(['serzhik.lu@yandex.ru' => 'sergey'])
        ->setTo(['lovekrishna@bk.ru'])
        ->setBody('Hello! first letter');
    $result = $mailer->send($message);
} catch (Swift_TransportException $e) {
    echo '<pre>' . print_r($e->getTrace(), 1);
}
