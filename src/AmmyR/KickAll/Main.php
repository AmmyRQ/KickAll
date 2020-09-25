<?php

/*
Created by AmmyR
Twitter: @AmmyRQ
*/

namespace AmmyR\KickAll;

use pocketmine\plugin\PluginBase;
use AmmyR\KickAll\Command;

class Main extends PluginBase {

	public function onEnable() : void{
		$this->getServer()->getCommandMap()->register("kickall", new Command($this));
	}

}
