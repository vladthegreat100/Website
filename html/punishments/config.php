<?php 
//    ###    ########  ##     ##    ###    ##    ##  ######  ######## ########    ########     ###    ##    ## 
//   ## ##   ##     ## ##     ##   ## ##   ###   ## ##    ## ##       ##     ##   ##     ##   ## ##   ###   ## 
//  ##   ##  ##     ## ##     ##  ##   ##  ####  ## ##       ##       ##     ##   ##     ##  ##   ##  ####  ## 
// ##     ## ##     ## ##     ## ##     ## ## ## ## ##       ######   ##     ##   ########  ##     ## ## ## ## 
// ######### ##     ##  ##   ##  ######### ##  #### ##       ##       ##     ##   ##     ## ######### ##  #### 
// ##     ## ##     ##   ## ##   ##     ## ##   ### ##    ## ##       ##     ##   ##     ## ##     ## ##   ### 
// ##     ## ########     ###    ##     ## ##    ##  ######  ######## ########    ########  ##     ## ##    ## 
	// In this file you can edit some content of the webside
	// If you want to edit the layout you have to go in to 'style.css' | CCS-Skills required
	// For any help, feedback, bug-reports or questions feel free to contact me via PM on Spigot/BukkitDev or to add me on Skype: Leoko33
	// I hope you like my WebPanel <3
	
////////////////////////////////////////////////
//             MySQL-Data                     //
//                                     	      //

	//Database-Name
	$DB_Name = "AdvancedBan";
	
	//MySQL- Server-IP/Domanin
	$Host = "localhost";
	
	//MySQL-Account
	$Username = "root";
	$Password = "wreF5kuMasp6Ga";
	
//                                            //
////////////////////////////////////////////////


////////////////////////////////////////////////
//             General                        //
//                                     	      //

	//Show who banned the player 
	//"Banned by"-Tag
	$BannedBy = true;
	
	//Change the way the date is displayed
	//This can get VERY buggy if the format
	//is too long. GER-Format: "d.m  H:i"
	$DateFormat = "m/d  H:i";
	
	//Amount of Entries showed on the 
	//main-page. [Ban, Tempbans, Kicks]
	$MaxEntries = 10;
	
	//WebSide-Title showed in 
	//the internet explorer
	$Title = "Override Network";
	
//                                            //
////////////////////////////////////////////////

////////////////////////////////////////////////
//             Messages                       //
//                                     	      //

	//General
	$msgTitle = "Punishments";
	$msgSearch = "Search for ban by name";
	$msgBannedBy = "Banned by »";
	$msgReason = "Reason »";
	
	//Main-Page
	$msgLastBans = "Last bans";
	$msgLastKicks = "Last kicks";
	$msgLastTempBans = "Last tempbans";
	$msgDuration = "Duratrion »";
	$msgNoBans = "There are no bans";
	$msgNoKicks = "There are no kicks";
	$msgNoTempBans = "There are no tempbans";
	
	//Player-Search
	$msgPlayerHistory = "PlayerHistory";
	$msgRemaining = "Remaining »";
	$msgNotBanned = "Not banned";
	$msgNoHistory = "There is no history for this player";
	$msgTDate = "Date";
	$msgTType = "Type";
	$msgTEnding = "Ending";
	$msgTBy = "By";
	$msgTReason = "Reason";
	$msgTempBanned = "Temporarily banned";
	$msgPermaBanned = "Permanently banned";
	
//                                            //
////////////////////////////////////////////////
?>