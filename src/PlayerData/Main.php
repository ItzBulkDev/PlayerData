<?php

namespace PlayerData;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir("player-databases/");
		@mkdir("player-databases/players/");
		}
		
public function onPlayerJoin(PlayerJoinEvent $event){
  $player = $event->getPlayer();
  $p = $player->getName();
  if(file_exists("player-databases/players/".$player.".txt")){
    $player->sendPopup(TextFormat::BLUE."Welcome back, $player");
    }else{
      $this->createConfig($player);
      $playerConfig = $this->getConfig($player);
      $ip = $player->getAddress();
      $getPlayer = new Config($this->getDataFolder()."kits.yml", Config::YAML, [
			.$player . => ["IP" => $ip, "Chat" => [
					"Working on this",
					"",
					""
				]
			],
		]);
      
      
