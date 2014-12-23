#if defined __LINUX__
#include <dlfcn.h>
#endif
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <iostream>
#include <string>
#include <sapi/embed/php_embed.h>
#include "samphp.h"

#if defined __LINUX__
void *library;
#endif

PLUGIN_EXPORT bool PLUGIN_CALL Load(void **ppData) {
	#if defined __LINUX__
		library = dlopen("/libphp5.so", RTLD_NOW);
	#endif
	sampgdk::Load(ppData);
	sampgdk::logprintf("  *****************************************************");
	sampgdk::logprintf("  *          SAMPHP Plugin revision "MAJOR"."MINOR"."REVISION"             *");
	sampgdk::logprintf("  *             ---------------------                 *");
	sampgdk::logprintf("  * For updates, check out our GitHub repository at : *");
	sampgdk::logprintf("  *     https ://github.com/crodriguespt/SAMPHP       *");
	sampgdk::logprintf("  *****************************************************");
	return true;
}

PLUGIN_EXPORT unsigned int PLUGIN_CALL Supports() {
	return sampgdk::Supports() | SUPPORTS_PROCESS_TICK;
}

PLUGIN_EXPORT void PLUGIN_CALL Unload() {
	samphp::unload();
	sampgdk::Unload();
	#if defined __LINUX__
		dlclose(library);
	#endif
}

PLUGIN_EXPORT void PLUGIN_CALL ProcessTick() {
	sampgdk::ProcessTick();
}
