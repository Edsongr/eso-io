<?php

namespace Edsongr\ESOIO\Db;

interface IDb
{

    public function table(string $table);

    public function select($collumns = "*");

    public function join(string $table, string $param1, string $param2);

    public function leftJoin(string $table, string $param1, string $param2);

    public function where(string $collumn, string $condition, string $value);

    public function get();
 
}
