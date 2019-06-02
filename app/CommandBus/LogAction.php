<?php

namespace App\CommandBus;

use App\CommandBus\Commands\LogCommand;
use App\CommandBus\Handlers\LogHandler;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class LogAction
{
	protected $bus;

	public function __construct()
    {
        $this->bus = app(CommandBusInterface::class);
        $this->bus->addHandler(LogCommand::class, LogHandler::class);
    }	

    public function logSMS(array $data = [])
    {
        $this->bus->dispatch(LogCommand::class, $data);

        return $this;      
    }
}