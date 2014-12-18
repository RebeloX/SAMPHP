SAMPHP - SA:MP Gamemode SDK for PHP
======

SAMPHP provides an API for developing SA:MP Gamemodes using the popular script language PHP.

Nearly every native function and every callback known from SA:MP are implemented.
Most functions have the exact same syntax as their PAWN counterpart.
Every function, that uses reference-passing got changed and either returns an associated array containing the information or if it only returns one information, returns it directly.

Examples
===
PAWN Example
```pawn
public OnPlayerConnect(playerid)
{
    //Get the name of the player that connected and display a join message to other players
 
    new name[MAX_PLAYER_NAME+1], string[24+MAX_PLAYER_NAME+1];
    GetPlayerName(playerid, name, sizeof(name));
 
    format(string, sizeof(string), "%s has joined the server.", name);
    SendClientMessageToAll(0xC4C4C4FF, string);
 
    return 1;
}
```

Same code with SAMPHP
```php
function OnPlayerConnect($playerid)
{
    //Get the name of the player that connected and display a join message to other players
    $playername = GetPlayerName($playerid);
 
    SendClientMessageToAll(0xC4C4C4FF, "$playername has joined the server.");
 
    return true;
}
```

Framework
===
We also created a very cool framework for SAMPHP, making it even more easier to write short and beautiful code.
The code above might look like the following:
```php
Event::on('PlayerConnect', function($player)
{
    SendClientMessageToAll(0xC4C4C4FF, $player->getName()." has joined the server.");
 
    return true;
});
```

Installation
===
Please look here for installation instructions:
http://forum.sa-mp.com/showthread.php?p=3264355

Compiling: Linux
===
1. You need: libxml2-dev, gcc, g++ (x86 environment!)
2. Clone the repository.
3. Run ./install_libphp5.sh as root, this will install php headers and libphp5.so
4. run ./build.sh and copy the created samphp file to your plugins folder

Compiling on Windows:
===
1. Download visual studio 2013
2. Clone the repository
3. Download PHP source code
4. Build the PHP source code with the parameters given in build-vs2013/php params windows.txt file.
5. Updated visual studio project properties with the new PHP include directories and library directories.
6. Clean up the project(If required) and Build it.
7. Move the created samphp.dll file to your sa-mp server plugin folder(And configure the server to load from it)

Thanks to
===
- SA:MP Team for developing SA:MP
- Zeex for developing the SAMPGDK which is used by SAMPHP
- All the PHP Core developers
- Lapayo(for creating this wrapper)
