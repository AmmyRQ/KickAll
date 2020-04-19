<?php

namespace AmmyR\KickAll;

use pocketmine\plugin\PluginBase;
use AmmyR\KickAll\Command;

class Main extends PluginBase {

	public function onEnable() : void{
		$this->getServer()->getCommandMap()->register("kickall", new Command($this));
		$this->getServer()->getLogger()->info("- §aKickAll by AmmyR enabled successfully. §b(Twitter: @AmmyRQ)");
	}

}