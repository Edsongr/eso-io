<?php

namespace Edsongr\ESOIO\Db;

class MySql extends AbstractDb implements IDb
{

    protected $table;
    protected $sql = [];

    public function table(string $table) : IDb
    {
        $this->table = '`' . $table . '`';
        return $this;
    }

    public function select($collumns = "*") : IDb 
    {

        if ($collumns != "*" && is_string($collumns))
        {
            $collumns = explode(',', $collumns);
            $collumns = array_map('trim', $collumns);
        }

        if (is_array($collumns))
        {
            $collumns = implode('`, `', $collumns);
            $collumns = '`' . $collumns . '`';
        }

        $this->sql['select'][] = sprintf(' %s ', $collumns);
        return $this;
    }

    public function join(string $table,string $param1, string $param2) : IDb 
    {
        if ($table)
            $this->sql['join'][] = sprintf(' INNER JOIN %s ON %s = %s.%s', $table, $param1, $this->table, $param2);

        return $this;
    }

    public function leftJoin(string $table, string $param1, string $param2) : IDb 
    {
        if ($table)
            $this->sql['left'][] = sprintf(' LEFT JOIN %s ON %s = %s', $table, $param1, $param2);

        return $this;
    }

    public function where(string $collumn, string $condition, string $value) : IDb 
    {
        if ($collumn)
            $this->sql['where'][] = " `{$collumn}` {$condition} '{$value}'";

        return $this;
    }

    // public function whereBetween(string $collumn, string $condition, string $value) : IDb 
    // {
    // }

    public function get()
    {
        /**
         * Trata SQL 
         */
        $sql = "SELECT " . implode(', ', $this->sql['select']) . " FROM " . $this->table;

        if (isset($this->sql['join']))
            $sql .= implode(' ', $this->sql['join']);

        if (isset($this->sql['left']))
            $sql .= implode(' ', $this->sql['left']);

        if (isset($this->sql['where']))
            $sql .= " WHERE " . implode(' ', $this->sql['where']);
            
        $sql = $this->pdo->prepare($sql);
		$sql->execute();

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }
    
}
