<?php 

namespace Edsongr\ESOIO\Db;

class Db implements IDb
{
    public $db;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public function table(string $table)
    {
        $this->db->table($table);
    }

    public function select($collumns = "*")
    {
        $this->db->select($collumns);
    }

    public function join(string $table, string $param1, string $param2) 
    {
        $this->db->join($table, $param1, $param2);
    }

    public function leftJoin(string $table, string $param1, string $param2) 
    {
        $this->db->leftJoin($table, $param1, $param2);
    }

    public function where(string $collumn, string $condition, string $value) 
    {
        $this->db->where($collumn, $condition, $value);
    }

    public function get()
    {
        $this->db->get();
    }

}
