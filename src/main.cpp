#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <iostream>
#include <string>
#include <sapi/embed/php_embed.h>
#include "samphp.h"

PLUGIN_EXPORT bool PLUGIN_CALL Load(void **ppData) {
	return sampgdk::Load(ppData);
}

PLUGIN_EXPORT unsigned int PLUGIN_CALL Supports() {
	//// The logprintf is here, so if the plugin doesn't load... we don't show the welcome message. :)
	sampgdk::logprintf("  *****************************************************");
	sampgdk::logprintf("  *          SAMPHP Plugin revision "MAJOR"."MINOR"."REVISION"             *");
	sampgdk::logprintf("  *             ---------------------                 *");
	sampgdk::logprintf("  * For updates, check out our GitHub repository at : *");
	sampgdk::logprintf("  *     https ://github.com/crodriguespt/SAMPHP       *");
	sampgdk::logprintf("  *****************************************************");
	sampgdk::logprintf("  * Released: %s %s", __DATE__, __TIME__);
	return sampgdk::Supports() | SUPPORTS_PROCESS_TICK;
}

PLUGIN_EXPORT void PLUGIN_CALL Unload() {
	samphp::unload();
	sampgdk::Unload();
}

PLUGIN_EXPORT void PLUGIN_CALL ProcessTick() {
	sampgdk::ProcessTick();
}
