<?php

namespace AmmyR\KickAll;

use pocketmine\command\{Command, CommandSender, PluginIdentifiableCommand};
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class KickCommand extends Command implements PluginIdentifiableCommand
{

	private $plugin;

	public function __construct(Main $main){
		$this->plugin = $main;
		parent::__construct("kickall", "Kick all the online players!", "/kickall <string: message>");
		$this->setPermission("kickall.command");
	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) : void{
		if(!$this->testPermission($sender)) return;

		$onlinePlayers = $this->plugin->getServer()->getOnlinePlayers();
		if(count($onlinePlayers) === 0 || (count($onlinePlayers) === 1 && $sender instanceof Player)){
			$sender->sendMessage(TextFormat::RED . "[KickAll] - There are no players to kick!");
			return;
		}

		foreach($onlinePlayers as $player){
			$player->kick(implode(" ", $args), false);
		}

		$this->plugin->getServer()->getLogger()
					 ->info("[KickAll] - All players kicked" . ($sender instanceof Player ? " by " . $sender->getName() : "") . "!");
	}
}
