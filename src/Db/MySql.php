<?php

namespace Edsongr\ESOIO\Db;

class MySql extends AbstractDb implements IDb
{

    protected $table;
    protected $sql;

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

        $this->sql = sprintf('SELECT %s FROM %s', $collumns, $this->table);
        return $this;
    }

    public function join(string $table,string $param1, string $param2) : IDb 
    {
        // Trabalhar melhor essa parte e da do Left
        if ($table)
            $this->sql .= sprintf(' INNER JOIN %s ON %s = %s.%s', $table, $param1, $this->table, $param2);

        return $this;
    }

    public function leftJoin(string $table, string $param1, string $param2) : IDb 
    {
        if ($table)
            $this->sql .= sprintf(' LEFT JOIN %s ON %s = %s', $table, $param1, $param2);

        return $this;
    }

    public function where(string $collumn, string $condition, string $value) : IDb 
    {
        // Trabalhar melhor no where com mais de 1 condição e sendo chamado depois
        if ($collumn)
            $this->sql .= " WHERE `{$collumn}` {$condition} '{$value}'";

        return $this;
    }

    public function get()
    {
        $sql = $this->pdo->prepare($this->sql);
		$sql->execute();
        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }
    
}
