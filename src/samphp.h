#pragma once
#pragma warning(disable: 4244)
#pragma warning(disable: 4800)
#pragma warning(disable: 4355)
//-------
#include <vector>
#include "sampgdk/sampgdk.h"
//-------
#define SUCCESS			0
#define FAIL			1
#define SAMPHPVERSION	"2.0.5"
#define MAJOR			"2"
#define MINOR			"0"
#define REVISION		"5"
//-------
struct tagTIMERS {
	int id;
	bool repeating;
};
//-------
typedef unsigned int php_ret;
//----
class samphp
{
public:
    samphp(bool typeError);
    ~samphp();

    static samphp* instance;
    static samphp* init();
    static void unload();
	
	std::vector<tagTIMERS> timers;
	std::vector<int> ConnectedPlayers;
	bool DEBUG = false;
	//START taken from facebook/phpembed. Take a look at their license: https://github.com/facebook/phpembed/blob/master/LICENSE
	bool callBool(char *fn, char *argspec = "", ...);
	zval *call(char *fn, char *argspec, va_list ap TSRMLS_DC);
	php_ret parse_args(zval **params,zend_uint *count, char *argspec, va_list ap);
	static void error_wrap(int error, const char * fmt, ...);
	
	//END taken from facebook/phpembed
	static void internal_error(const char *str);

    bool loadGamemode();
	void loadConfig();
	//---- 
	void HandlePlayer(bool join, int playerid);

	php_ret status;

protected:
	std::string loadedFile;

};

//void samphp_output_handler(const char *str);
int samphp_output_handler(const char *str, unsigned int str_length TSRMLS_DC);
void samphp_error_handler(char *str);

int php_set_ini_entry(char *entry, char *value, int stage);

// Created by: https://github.com/Zeex/sampgdk/blob/master/plugins/unlimitedfs/unlimitedfs.cpp
std::string GetServerCfgOption(const std::string &option);