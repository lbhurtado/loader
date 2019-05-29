<?php

use LBHurtado\SMS\Facades\SMS;

$router = resolve('missive:router');

$router->register('LOG {message}', function (string $path, array $values) {
    \Log::info($values['message']);
});

$router->register('PING', function (string $path, array $values) use ($router) {
    tap($router->missive->getSMS()->origin, function ($contact) use ($values) {
        SMS::from('TXTCMDR')->to($contact->mobile)->content('PONG')->send();
    });
});

$router->register('SEND {country=(\+?63|0)}{mobile=[0-9]{10}} {message=.*}', function (string $path, array $values) use ($router) {
    tap($router->missive->getSMS()->origin, function ($contact) use ($values) {
        $mobile = "+63".$values['mobile'];
        SMS::from('TXTCMDR')->to($mobile)->content($values['message'])->send();
    });
});
