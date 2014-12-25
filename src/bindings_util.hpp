PHP_FUNCTION(SendClientMessage)
{
	int playerId, color, message_len;
	char *message;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                        "lls", &playerId, &color, &message, &message_len) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_SendClientMessage(playerId, color, message);
}

PHP_FUNCTION(SendClientMessageToAll)
{
	int color, message_len;
	char *message;
	
	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                        "ls", &color, &message, &message_len) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_SendClientMessageToAll(color, message);
}

PHP_FUNCTION(SendPlayerMessageToPlayer)
{
	int playerid, senderid, message_len;
	char *message;
	
	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                        "lls", &playerid, &senderid, &message, &message_len) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_SendPlayerMessageToPlayer(playerid, senderid, message);
}

PHP_FUNCTION(SendPlayerMessageToAll)
{
	int senderid, message_len;
	char *message;
	
	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                        "ls", &senderid, &message, &message_len) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_SendPlayerMessageToAll(senderid, message);
}

PHP_FUNCTION(SendDeathMessage)
{
	int killerId, victimId, weapon;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                         "lll", &killerId, &victimId, &weapon) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_SendDeathMessage(killerId, victimId, weapon);
}

PHP_FUNCTION(GameTextForAll)
{
	char *string;
	int string_len, time, style;
	
	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                        "sll", &string, &string_len, &time, &style) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_GameTextForAll(string, time, style);
}

PHP_FUNCTION(GameTextForPlayer)
{
	int playerid, message_len, time, style;
	char *message;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                         "lsll", &playerid, &message, &message_len, &time, &style) == FAILURE)
	{
        RETURN_NULL();
    }

    sampgdk_GameTextForPlayer(playerid, message, time, style);
}

struct TimerParams {
	zval* callable;
	char* functionName;
};

static void SAMPGDK_CALL executeTimedCallback(int timerId, void *voidParams)
{
	TimerParams *params = (TimerParams *) voidParams;
	zval retval, *argument;
	MAKE_STD_ZVAL(argument);
	ZVAL_LONG(argument, timerId);

	zval *callbackParams[] = { argument };
	call_user_function(CG(function_table), NULL, params->callable, &retval, 1, callbackParams TSRMLS_CC);	

	//---- Delete the timer if it's a non-repeat timer.
	for (std::vector<tagTIMERS>::iterator it = samphp::instance->timers.begin();
		it != samphp::instance->timers.end(); ++it) {
		if (it->id == timerId && it->repeating == false) {
			samphp::instance->timers.erase(it);
			break;
		}
	}
}

PHP_FUNCTION(SetTimer)
{
	TimerParams *params = new TimerParams;

	zval* callable;
	int interval;
	bool repeating;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                         "olb", &callable, &interval, &repeating) == FAILURE)
	{
        RETURN_NULL();
    }

    Z_ADDREF_P(callable);
    params->callable = callable;
	
	int ret = sampgdk_SetTimer(interval, repeating, executeTimedCallback, (void*) params);
	
	// We need to keep a track of timers running in the PHP script, so when calling GMX, the server doesn't crash.
	tagTIMERS timer;
	timer.id = ret;
	timer.repeating = repeating;
	samphp::instance->timers.push_back(timer);

    RETVAL_LONG(ret);
}

PHP_FUNCTION(KillTimer)
{
	int timerId;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
                         "l", &timerId) == FAILURE)
	{
        RETURN_NULL();
    }

	for (std::vector<tagTIMERS>::iterator it = samphp::instance->timers.begin();
		it != samphp::instance->timers.end(); ++it) {
		if (it->id == timerId) {
			samphp::instance->timers.erase(it);
			break;
		}
	}

    sampgdk_KillTimer(timerId);
}

PHP_FUNCTION(GetTickCount)
{
	int count = sampgdk_GetTickCount();

    RETVAL_LONG(count);
}

PHP_FUNCTION(GetMaxPlayers)
{
    RETVAL_LONG(sampgdk_GetMaxPlayers());
}

PHP_FUNCTION(GetPlayerCount) {
	RETVAL_LONG(samphp::instance->ConnectedPlayers.size());
}

PHP_FUNCTION(GetPlayerList) {
	if (samphp::instance->ConnectedPlayers.size() == 0)
		RETURN_NULL();

	array_init(return_value);
	for (std::vector<int>::iterator it = samphp::instance->ConnectedPlayers.begin();
		it != samphp::instance->ConnectedPlayers.end(); ++it) {
		add_next_index_long(return_value, *it);
	}

}

PHP_FUNCTION(KillAllTimers) {
	for (std::vector<tagTIMERS>::iterator it = samphp::instance->timers.begin();
		it != samphp::instance->timers.end(); ++it)
		sampgdk_KillTimer(it->id); // Kills the timer
	samphp::instance->timers.clear();
}

PHP_FUNCTION(GetTimersCount) {
	RETVAL_LONG(samphp::instance->timers.size());
}