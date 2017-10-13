<?php

namespace erkam2002;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;

class WorldTP extends PluginBase implements Listener {

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if ($cmd->getName() == "worldtp"){
            if (empty($args[0])){
                if($args[0] == $args[0]){
                    $worldname = $args[0];
                    $world = $this->getServer()->getLevelByName($worldname);
                    if(!$world == null){
                        $this->getServer()->loadLevel($worldname);
                        $this->getServer()->getLevelByName($worldname)->getSafeSpawn();
                        $sender->sendMessage(C::GREEN."You teleported yourself to world: ".C::RED.$worldname);
                    }else{
                        $sender->sendMessage(C::DARK_RED."World ".$worldname." doesnt exist!");
                    }
                }
            }
        }
    }
}