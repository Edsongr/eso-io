<?php 

namespace Edsongr\ESOIO\Notify;

class Notify implements INotify
{
    public $notifier;

    public function __construct(INotify $notifier)
    {
        $this->notifier = $notifier;
    }

    public function getGroupsByUser(int $id) 
    {
        return $this->notifier->getGroupsByUser($id);
    }

    public function setReceiver(string $receiver) 
    {
        $this->notifier->setReceiver($receiver);
    }

    public function getReceiver() 
    {
        $this->notifier->getReceiver();
    }

    public function setSender(string $sender) 
    {
        $this->notifier->setSender($sender);
    }

    public function getSender() 
    {
        $this->notifier->getSender();
    }

    public function setTitle(string $title)
    {
        $this->notifier->setTitle($title);
    }

    public function getTitle()
    {
        $this->notifier->getTitle();
    }

    public function setMessage(string $message)
    {
        $this->notifier->setMessage($message);
    }

    public function getMessage() 
    {
        $this->notifier->getMessage();
    }

    public function setSong(bool $song)
    {
        $this->notifier->setSong($song);
    }

    public function getSong()
    {
        $this->notifier->getSong();
    }

    public function setTypeAlert(string $message)
    {
        $this->notifier->setTypeAlert($message);
    }

    public function getTypeAlert()
    {
        $this->notifier->getTypeAlert();
    }

    public function sendNotify()
    {
        return $this->notifier->sendNotify();
    }

}
