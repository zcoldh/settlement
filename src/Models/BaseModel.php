<?php


namespace Zcold\Settlement\Models;

use Medoo\Medoo;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'name',
            'server' => 'localhost',
            'username' => 'your_username',
            'password' => 'your_password',
            'charset' => 'utf8'
        ]);
    }

    public function getDb()
    {
        return $this->db;
    }

    public function insert($datas)
    {
        return $this->db->insert($this->table, $datas);
    }

    public function select($join, $columns = null, $where = null)
    {
        return $this->db->select($this->table, $join, $columns, $where);
    }

    public function update($data, $where = null)
    {
        return $this->db->update($this->table, $data, $where);
    }
}