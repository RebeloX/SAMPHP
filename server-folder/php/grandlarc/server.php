<?php
class Gamemode {
	static public $txtLosSantos;
	static public $txtSanFierro;
	static public $txtLasVenturas;
	static public $txtClassSelHelp;

	static public function Load() {

		echo "\n---------------------------------------";
		echo "Running Grand Larceny - by the SA-MP team";
		echo "---------------------------------------";
		echo "Proudly converted for PHP by GWMPT.";
        //---
        echo "-------------------------------";
        echo "PHP Version: \t\t\"".phpversion().'"';
        echo "SAMPGDK Version: \t\"".sampgdkversion().'"';
        echo "SAMPHP Version: \t\"".samphpversion().'"';
        echo "-------------------------------\n";
		//---
		Server::setGameModeText("PHP GrandLarc");
		Server::showPlayerMarkers(PLAYER_MARKERS_MODE_GLOBAL);
		Server::showNameTags(1);
		Server::setNameTagDrawDistance(40.0);
		Server::enableStuntBonus(0);
		Server::disableInteriorEnterExits();
		Server::setWeather(2);
		Server::setWorldTime(11);

		Server::usePlayerPedAnims();
		//ManualVehicleEngineAndLights();
		//LimitGlobalChatRadius(300.0);

		// Player Class
		Server::addPlayerClass(281,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(282,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(283,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(284,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(285,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(286,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(287,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(288,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(289,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(265,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(266,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(267,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(268,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(269,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(270,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(1,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(2,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(3,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(4,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(5,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(6,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(8,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(42,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(65,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		//Server::addPlayerClass(74,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(86,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(119,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
	 	Server::addPlayerClass(149,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(208,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(273,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(289,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		
		Server::addPlayerClass(47,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(48,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(49,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(50,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(51,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(52,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(53,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(54,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(55,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(56,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(57,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(58,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
	   	Server::addPlayerClass(68,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(69,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(70,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(71,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(72,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(73,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(75,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(76,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(78,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(79,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(80,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(81,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(82,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(83,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(84,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(85,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(87,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(88,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(89,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(91,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(92,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(93,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(95,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(96,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(97,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(98,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);
		Server::addPlayerClass(99,1759.0189,-1898.1260,13.5622,266.4503,-1,-1,-1,-1,-1,-1);

		$total_vehicles_from_files = 0;
		// SPECIAL
		$total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/trains.txt");
		$total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/pilots.txt");

	   	// LAS VENTURAS
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/lv_law.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/lv_airport.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/lv_gen.txt");
	    
	    // SAN FIERRO
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/sf_law.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/sf_airport.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/sf_gen.txt");
	    
	    // LOS SANTOS
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/ls_law.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/ls_airport.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/ls_gen_inner.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/ls_gen_outer.txt");
	    
	    // OTHER AREAS
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/whetstone.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/bone.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/flint.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/tierra.txt");
	    $total_vehicles_from_files += Vehicle::loadStaticVehiclesFromFile("vehicles/red_county.txt");

	    echo "Total vehicles loaded from files: {$total_vehicles_from_files}";

	    // I do know that PHP isn't function oriented, and textdraws can be created outside functions
	    // Yet, I like to keep the simplicity of the code by using functions.
	    static::$txtLosSantos = Textdraw::create(10.0, 380.0, "Los Santos");
	    static::$txtLosSantos->useBox();
	    static::$txtLosSantos->setLetterSize(1.25,3.0);
	    static::$txtLosSantos->setFont(0);
	    static::$txtLosSantos->setShadow(0);
        static::$txtLosSantos->setOutline(1);
        static::$txtLosSantos->setColor(0xEEEEEEFF);
        static::$txtLosSantos->setBackgroundColor(0x000000FF);

       	static::$txtSanFierro = Textdraw::create(10.0, 380.0, "San Fierro");
	    static::$txtSanFierro->useBox();
	    static::$txtSanFierro->setLetterSize(1.25,3.0);
	    static::$txtSanFierro->setFont(0);
	    static::$txtSanFierro->setShadow(0);
        static::$txtSanFierro->setOutline(1);
        static::$txtSanFierro->setColor(0xEEEEEEFF);
        static::$txtSanFierro->setBackgroundColor(0x000000FF);

       	static::$txtLasVenturas = Textdraw::create(10.0, 380.0, "Las Venturas");
	    static::$txtLasVenturas->useBox();
	    static::$txtLasVenturas->setLetterSize(1.25,3.0);
	    static::$txtLasVenturas->setFont(0);
	    static::$txtLasVenturas->setShadow(0);
        static::$txtLasVenturas->setOutline(1);
        static::$txtLasVenturas->setColor(0xEEEEEEFF);
        static::$txtLasVenturas->setBackgroundColor(0x000000FF);

		static::$txtClassSelHelp = Textdraw::create(10.0, 415.0,
		   " Press ~b~~k~~GO_LEFT~ ~w~or ~b~~k~~GO_RIGHT~ ~w~to switch cities.~n~ Press ~r~~k~~PED_FIREWEAPON~ ~w~to select.");
		static::$txtClassSelHelp->useBox();
		static::$txtClassSelHelp->setBoxColor(0x222222BB);
		static::$txtClassSelHelp->setLetterSize(0.3,1.0);
		static::$txtClassSelHelp->setTextSize(400.0,40.0);
		static::$txtClassSelHelp->setFont( 2);
		static::$txtClassSelHelp->setShadow(0);
	    static::$txtClassSelHelp->setOutline(1);
	    static::$txtClassSelHelp->setBackgroundColor(0x000000FF);
	    static::$txtClassSelHelp->setColor(0xFFFFFFFF);

	}
}
Event::on("GameModeInit", ["Gamemode","Load"]);
?>