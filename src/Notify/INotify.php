<?php 

namespace Edsongr\ESOIO\Notify;

interface INotify
{
    public function setReceiver(string $receiver);

    public function getReceiver();

    public function setSender(string $sender);

    public function getSender();

    public function setTitle(string $title);

    public function getTitle();

    public function setMessage(string $message);

    public function getMessage();

    public function setSong(bool $song);

    public function getSong();

    public function setPulse(bool $pulse);
    
    public function setTypeAlert(string $message);

    public function getTypeAlert();
    
    public function sendNotify();
}

