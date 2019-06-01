<?php

namespace App\CommandBus;

use Joselfonseca\LaravelTactician\CommandBusInterface;
use App\CommandBus\Commands\PingCommand;
use App\CommandBus\Handlers\PingHandler;

class PingAction
{
	protected $bus;

	public function __construct()
    {
        $this->bus = app(CommandBusInterface::class);
        $this->bus->addHandler(PingCommand::class, PingHandler::class);
    }	

    public function sendReply(array $data = [])
    {
        $this->bus->dispatch(PingCommand::class, $data);

        return $this;      
    }
}