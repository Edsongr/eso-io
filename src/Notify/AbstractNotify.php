<?php

namespace Edsongr\ESOIO\Notify;

use Edsongr\ESOIO\Db\Db;
use Edsongr\ESOIO\Db\MySql;

abstract class AbstractNotify
{

    public $receivers = 'ALL';
    public $sender    = "";
    public $title     = "";
    public $message   = "";
    public $typeAlert = "INFO"; // INFO, SUCCESS, WARNING, DANGER
    public $shootSound= false;
    public $pulse     = false;

    public function getGroupsByUser(int $id)
    {
        $db = new Db(new MySql);
   
        return $db->db->table('notify_groups')
                    ->select()
                    ->join('notify_group_user', 'notify_group_id', 'id')
                    ->where('user_id', '=', $id)
                    ->get();
    }

    public function sendNotify()
    {

        if ($this->message == "")
            return array('success' => false, 'message' => "Preencha o corpo da Mensagem. Use o metodo ->setMessage('sua mensagem');!");

        $data = [
            'title'         => $this->title,
            'message'       => $this->message,
            'sender'        => $this->sender,
            'receivers'     => $this->receivers,
            'typeAlert'     => $this->typeAlert,
            'shootSound'    => $this->shootSound,
            'pulse'         => $this->pulse
        ]; 

        // Deixar Dinamico pelo ENV
        $url    = "http://localhost:3000/";

        $params = http_build_query($data);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        
        $response = curl_exec($ch);
        
        curl_close($ch);

        $response = (array) (json_decode($response));

        return $response;
    }

}