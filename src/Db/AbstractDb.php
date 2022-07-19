<?php 

namespace Edsongr\ESOIO\Db;

abstract class AbstractDb
{

    protected $pdo = null;

    public function __construct()
    {
        $this->pdo  = new \PDO('mysql:host=127.0.0.1;dbname=eso_io', 'root', '');
    }

}