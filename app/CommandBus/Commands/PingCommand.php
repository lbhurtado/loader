<?php

namespace App\CommandBus\Commands;

/**
 * Class PingCommand
 * @package App\CommandBus\Commands
 */
class PingCommand
{
	/** @var string */
	public $mobile;

    /**
     * PingCommand constructor.
     *
     * @param string $mobile
     */
    public function __construct(string $mobile)
    {
    	$this->mobile = $mobile;
    }
}
