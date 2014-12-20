<?php

class CMD
{
	protected static $commands;

	public static function register($commands, $callback)
	{
		foreach((array) $commands as $command)
		{
			$command = '/'.strtolower(ltrim($command, '/'));
			static::$commands[$command] = $callback;
		}
	}

	public static function handleCommand($player, $commandStr)
	{
		$splittedParams = explode(' ', $commandStr);

		$command = strtolower($splittedParams[0]);

		if(!isset(static::$commands[$command])) return false;

		array_shift($splittedParams);
		
		array_unshift($splittedParams, $player);

		call_user_func_array(static::$commands[$command], $splittedParams);

		return true;
	}
}

class_alias('CMD', 'Command');

Event::on('PlayerCommandText', array('CMD', 'handleCommand'));
