<?php

namespace GodSlime\BajanVlogs;

use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level;
use pocketmine\level\sound;

class main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onUse(PlayerInteractEvent $event) {
    $player = $event->getPlayer();
    if(count($player->getEffects()) != 3) {
      if($event->getItem()->getID() == 341) {
        $player->getInventory()->removeItem(Item::get(341, 0, 1));
        $player->addEffect(Effect::getEffect(Effect::STRENGTH)->setAmplifier(3)->setDuration(100 * 20));
        $player->addEffect(Effect::getEffect(Effect::SPEED)->setAmplifier(3)->setDuration(100 * 20));
        $player->addEffect(Effect::getEffect(Effect::REGENERATION)->setAmplifier(3)->setDuration(100 * 20));
        $player->addEffect(Effect::getEffect(Effect::JUMP_BOOST)->setAmplifier(3)->setDuration (100 * 20));
        $player->addEffect(Effect::getEffect(Effect::HASTE)->setAmplifier(3)->setDuration (100 * 20));
        $player->addEffect(Effect::getEffect(Effect::HEALTH_BOOST)->setAmplifier(3)->setDuration (100 * 20));
        $player->addEffect(Effect::getEffect(Effect::INVISBILITY)->setAmplifier(3)->setDuration (50 * 10));
        $player->getLevel()->addSound(new \pocketmine\level\sound\LaunchSound($player)); 
        $player->sendMessage("[Server Name] You have used a god slime");
      }
    }
  }
}
