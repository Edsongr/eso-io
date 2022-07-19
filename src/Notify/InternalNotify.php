<?php 

namespace Edsongr\ESOIO\Notify;

class InternalNotify extends AbstractNotify implements INotify
{
    public function setReceiver(string $receivers) : INotify
    {
        $this->receivers = $receivers;
        return $this;
    }

    public function getReceiver() : string
    {

    }

    public function setSender(string $sender) : INotify
    {
        $this->sender = $sender;
        return $this;
    }

    public function getSender() : string
    {

    }

    public function setTitle(string $title) : INotify
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle() : string
    {

    }

    public function setMessage(string $message) : INotify
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage() : string
    {

    }

    public function setSong(bool $shootSound) : INotify
    {
        $this->shootSound = $shootSound;
        return $this;
    }

    public function getSong() : string
    {

    }

    public function setTypeAlert(string $typeAlert) : INotify
    {
        $this->typeAlert = $typeAlert;
        return $this;
    }

    public function getTypeAlert() : string
    {

    }

}