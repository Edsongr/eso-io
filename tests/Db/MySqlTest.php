<?php 

namespace Edsongr\ESOIO\Db;

use \PHPUnit\Framework\TestCase;

class MySqlTest extends TestCase
{

    final public function getConnection()
    {
        $db = new Db(new MySql);
        return $db->db;
    }

    public function testTypeGetAllGroups()
    {
        $db   = $this->getConnection();

        $actual = $db->table('notify_groups')
                    ->select()
                    ->get();

        $this->assertIsArray($actual);
    }

    public function testSelectGroupsByUser()
    {

        $db   = $this->getConnection();

        $actual = $db->table('notify_groups')
                    ->select()
                    ->join('notify_group_user', 'notify_group_id', 'id')
                    ->where('user_id', '=', 1)
                    ->get();

        $this->assertIsArray($actual);

        if (isset($actual[0]))
            $this->assertArrayHasKey('id', (array) $actual[0]);
    }

}
