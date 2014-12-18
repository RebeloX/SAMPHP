Changelog
=========
2014/11/23:
- BUG FIX #4 - Missing callbacks in the definitions export file.
- BUG FIX #5 - Missing callbacks OnHTTPResponse(useless, IKR) and OnPlayerWeaponShot

2014/11/22:
- Added, again, RegisterAMXNative, CallAMXNative and AMXNativeExists
- Added the functions sampgdkversion, samphpversion, which returns the versions of the samphp plugin and sampgdk.
- Added the funtion GetAMXNativesList, which returns a array with every Native registered in the server.
- Updated the extension directory for php/ext, now every extension should be copied into the ext folder.
- BUG FIX #2 - Missing INT return when adding player class.
- BUG FIX #3 - Function Player::setShopName was executing a wrong function
2014/11/18:
- Updated the PHP Version for 5.6.3
- Added support for MySQLI and PDO.

2014/11/11:
- Removed AMXNativeExists, RegisterAMXNative and CallAMXNative temporarly.
- Updated the PLUGIN to support SAMPGDK 4.(samp 0.3z r4)
- Updated the visual studio project files for visual studio 2013.
- Now, it's possible to register commands with the CMD class or Command class(alias).

2014/05/12 (made by erorcun):
- Now it's compatible with 0.3z
- Serious Object/PlayerObject problem in framework fixed
- Callbacks' return values fixed

2013/06/12: (made by lapayo)
- added AMXNativeExists, RegisterAMXNative and CallAMXNative (examples: http://forum.sa-mp.com/showpost.php?p=2565856&postcount=69)

2013/06/10: (made by lapayo)
- Fixed pdo and mysql support for linux users
- Added Player::all() and Vehicle::all()

Initial release by lapayo
