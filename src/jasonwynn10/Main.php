<?php
namespace jasonwynn10;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;

class Main extends PluginBase implements Listener {
  public $set = false;
  public function onEnable() {
    $this->saveDefaultConfig();
    $this->reloadConfig();
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->notice(TF::GREEN."Enabled!");
  }
  public function infinity(BlockBreakEvent $event) {
    $p = $event->getPlayer();
    $b = $event->getBlock();
    if($this->set[$p->getName()]) {
      $event->setCancelled();
      //TODO block position saving
    }
    if($b->getX() == $this->getConfig()->get("")) {
      if($b->getY() == $this->getConfig()->get("")) {
        if($b->getZ() == $this->getConfig()->get("")) {
          $this->setCancelled();
          //TODO randomizer for drops
        }
      }
    }
  }
  public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
    if(strtolower($command) === "infinity") {
      if($sender->hasPermission("infinity.cmd")) {
        $this->set[$sender->getName()] = true;
      }
    }
    return false;
  }
  public function onDisable() {
    $this->getLogger()->notice(TF::GREEN."Disabled!");
  }
}
