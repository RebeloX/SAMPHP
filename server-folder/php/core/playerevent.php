<?php

class PlayerEvent {
	
	protected static $instances = array();
	protected $id, $player, $event, $callback;
	
	public static function find($player, $event) {
		if (isset(static::$instances[$player->id][$event])) {
			return static::$instances[$player->id][$event];
		}
		return null;
	}
	
	public static function create(Player $player, $event, $callback) {
		$id = 0; while (isset(static::$instances[$player->id][$event][$id])) {
			$id++;
		}
		return static::$instances[$player->id][$event][$id] = new static($id, $player, $event, $callback);
	}
	
	protected function __construct($id, $player, $event, $callback) {
		$this->id = $id;
		$this->player = $player;
		$this->event = $event;
		$this->callback = $callback;
	}
	
	public function fire() {
		$args = func_get_args();
		call_user_func_array($this->callback, $args);
	}

	public function destroy() {
		unset(static::$instances[$this->player->id][$this->event][$this->id]);
	}
	
	public static function destroyAllForPlayer($player) {
		if (isset(static::$instances[$player->id])) {
			unset (static::$instances[$player->id]);
		}
	}
}

Event::after('PlayerDisconnect', array('PlayerEvent', 'destroyAllForPlayer'));

foreach($callbackList as $callback) {
	$prefix = "OnPlayer";
	$prefix_len = strlen($prefix);

	if(substr($callback, 0, $prefix_len) == $prefix) {
		$intern = substr($callback, $prefix_len);
		Event::on(substr($callback, 2), function($player) use($intern) {
			if (($event = PlayerEvent::find($player, $intern))) {
				$args = func_get_args();
				foreach ($event as $callback) {
					call_user_func_array(array($callback, 'fire'), $args);
				}
			}
		});
	}
}
