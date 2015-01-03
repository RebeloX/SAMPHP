<?php

/**
 * Class Event * @method static bool onDialogResponse(mixed $eventFunction)
 * @method static bool onEnterExitModShop(mixed $eventFunction)
 * @method static bool onGameModeExit(mixed $eventFunction)
 * @method static bool onGameModeInit(mixed $eventFunction)
 * @method static bool onObjectMoved(mixed $eventFunction)
 * @method static bool onPlayerClickMap(mixed $eventFunction)
 * @method static bool onPlayerClickPlayer(mixed $eventFunction)
 * @method static bool onPlayerClickPlayerTextDraw(mixed $eventFunction)
 * @method static bool onPlayerClickTextDraw(mixed $eventFunction)
 * @method static bool onPlayerCommandText(mixed $eventFunction)
 * @method static bool onPlayerConnect(mixed $eventFunction)
 * @method static bool onPlayerDeath(mixed $eventFunction)
 * @method static bool onPlayerDisconnect(mixed $eventFunction)
 * @method static bool onPlayerEditAttachedObject(mixed $eventFunction)
 * @method static bool onPlayerEditObject(mixed $eventFunction)
 * @method static bool onPlayerEnterCheckpoint(mixed $eventFunction)
 * @method static bool onPlayerEnterRaceCheckpoint(mixed $eventFunction)
 * @method static bool onPlayerEnterVehicle(mixed $eventFunction)
 * @method static bool onPlayerExitVehicle(mixed $eventFunction)
 * @method static bool onPlayerExitedMenu(mixed $eventFunction)
 * @method static bool onPlayerGiveDamage(mixed $eventFunction)
 * @method static bool onPlayerInteriorChange(mixed $eventFunction)
 * @method static bool onPlayerKeyStateChange(mixed $eventFunction)
 * @method static bool onPlayerLeaveCheckpoint(mixed $eventFunction)
 * @method static bool onPlayerLeaveRaceCheckpoint(mixed $eventFunction)
 * @method static bool onPlayerObjectMoved(mixed $eventFunction)
 * @method static bool onPlayerPickUpPickup(mixed $eventFunction)
 * @method static bool onPlayerPrivmsg(mixed $eventFunction)
 * @method static bool onPlayerRequestClass(mixed $eventFunction)
 * @method static bool onPlayerRequestSpawn(mixed $eventFunction)
 * @method static bool onPlayerSelectObject(mixed $eventFunction)
 * @method static bool onPlayerSelectedMenuRow(mixed $eventFunction)
 * @method static bool onPlayerSpawn(mixed $eventFunction)
 * @method static bool onPlayerStateChange(mixed $eventFunction)
 * @method static bool onPlayerStreamIn(mixed $eventFunction)
 * @method static bool onPlayerStreamOut(mixed $eventFunction)
 * @method static bool onPlayerTakeDamage(mixed $eventFunction)
 * @method static bool onPlayerWeaponShot(mixed $eventFunction)
 * @method static bool onPlayerTeamPrivmsg(mixed $eventFunction)
 * @method static bool onPlayerText(mixed $eventFunction)
 * @method static bool onPlayerUpdate(mixed $eventFunction)
 * @method static bool onRconCommand(mixed $eventFunction)
 * @method static bool onRconLoginAttempt(mixed $eventFunction)
 * @method static bool onVehicleDamageStatusUpdate(mixed $eventFunction)
 * @method static bool onVehicleDeath(mixed $eventFunction)
 * @method static bool onVehicleMod(mixed $eventFunction)
 * @method static bool onVehiclePaintjob(mixed $eventFunction)
 * @method static bool onVehicleRespray(mixed $eventFunction)
 * @method static bool onVehicleSpawn(mixed $eventFunction)
 * @method static bool onVehicleStreamIn(mixed $eventFunction)
 * @method static bool onVehicleStreamOut(mixed $eventFunction)
 * @method static bool onIncomingConnection(mixed $eventFunction)
 * @method static bool onTrailerUpdate(mixed $eventFunction)
 * @method static bool onUnoccupiedVehicleUpdate(mixed $eventFunction)
 */
class Event
{
	protected static $events = array(
		'on' => array(),
		'after' => array(),
	);

    public static function __callStatic($name, $arguments)
    {
        if (substr($name, 0, 2) == "on" && count($arguments) == 1) {
            $eventId = substr($name, 2);
            static::on($eventId, $arguments[0]);
            return true;
        }
    }


	public static function on($eventId, $eventFunction)
	{
		if(is_callable($eventFunction))
			static::$events['on'][$eventId][] = $eventFunction;
	}

	public static function after($eventId, $eventFunction)
	{
		if(is_callable($eventFunction))
			static::$events['after'][$eventId][] = $eventFunction;
	}

	public static function fireDefault($eventId, $default = true)
	{
		$args = func_get_args();
		unset($args[1]);

		$result = call_user_func_array(array('Event', 'fire'), $args);

		if(!is_null($result)) return $result;

		return $default;
	}
	
	public static function fire($eventId)
	{
		$args = func_get_args();
		unset($args[0]);
		
		$result = null;

		if(isset(static::$events['on'][$eventId]))
		{
			foreach(static::$events['on'][$eventId] as $callback)
			{
				$res = call_user_func_array($callback, $args);
				
				if(!is_null($res))
					$result = $res;
			}			
		}

		if(isset(static::$events['after'][$eventId]))
		{
			foreach(static::$events['after'][$eventId] as $callback)
			{
				$res = call_user_func_array($callback, $args);
				
				if(!is_null($res))
					$result = $res;
			}	
		}

		return $result;
	}

	public static function untilDifferent($eventId, $expected = true)
	{
		$args = func_get_args();
		unset($args[0]);
		unset($args[1]);

		if(isset(static::$events['on'][$eventId]))
		{
			foreach(static::$events['on'][$eventId] as $callback)
			{
				$res = call_user_func_array($callback, $args);
				
				if(!is_null($res) && $res !== $expected)
					return $res;
			}			
		}

		if(isset(static::$events['after'][$eventId]))
		{
			foreach(static::$events['after'][$eventId] as $callback)
			{
				$res = call_user_func_array($callback, $args);
				
				if(!is_null($res) && $res !== $expected)
					return $res;
			}				
		}

		return $expected;
	}

	public static function cancelWithPrefix($prefix)
	{
		$prefixLength = strlen($prefix);

		foreach(static::$events['on'] as $name => &$callbacks)
		{
			if(substr($name, 0, $prefixLength) == $prefix)
				unset(static::$events['on'][$name]);
		}

		foreach(static::$events['after'] as $name => &$callbacks)
		{
			if(substr($name, 0, $prefixLength) == $prefix)
				unset(static::$events['after'][$name]);
		}
	}
}


/*
trait ModelEventHandler
{
	public function on($name, $callback)
	{
		$name = $this->callbackName($name);

		Event::on($name, $callback);
	}

	public function fire($name)
	{
		$args = func_get_args();
		$args[0] = $this->callbackName($name);

		return call_user_func_array(array('Event', 'fire'), $args);
	}

	public function cancelAll()
	{
		Event::cancelWithPrefix($this->eventPrefix.'.'.$this->id);
	}

	protected function callbackName($name)
	{
		return $this->eventPrefix.'.'.$this->id.'.'.$name;
	}
}
*/
?>