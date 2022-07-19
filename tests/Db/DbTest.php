<?php 

namespace Edsongr\ESOIO\Db;

use \PHPUnit\Framework\TestCase;

class DbTest extends TestCase
{

    public function testIfClassStarted()
    {
        $db  = new Db(new MySql);

        $this->assertInstanceOf('Edsongr\ESOIO\Db\Db', $db);
    }
    
}
