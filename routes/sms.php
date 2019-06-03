<?php

use LBHurtado\SMS\Facades\SMS;
use LBHurtado\Missive\Actions\TopupMobileAction;
use App\CommandBus\{PingAction, SendAction, LogAction};

$router = resolve('missive:router');

$router->register('LOG {message}', app(LogAction::class));

$router->register('PING', app(PingAction::class));

$router->register('SEND {country=(\+?63|0)}{mobile=[0-9]{10}} {message=.*}', function (string $path, array $values) use ($router) {
    tap($router->missive->getSMS()->origin, function ($contact) use ($values) {
        extract($values);

        (new SendAction)
            ->createContact(compact('mobile'))
            ->sendMessage(compact('mobile', 'message'))
        ;
    });
});

$router->register('TOPUP {country=(\+?63|0)}{mobile=[0-9]{10}} {amount=\d+}', function (string $path, array $values) use ($router) {
    tap($router->missive->getSMS()->origin, function ($contact) use ($values) {
        $mobile = "+63".$values['mobile'];
        $amount = $values['amount'];
        SMS::to($mobile)->topup($amount);
    });
});
