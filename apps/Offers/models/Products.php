<?php

namespace Offers\Model;
class Products extends \Home\BaseModel
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'products';
        $this->columns = [
            'id',
            'name',
            'value',
            'user_id',
            'ts_create'
        ];
    }

    public function get($name)
    {
        $sql = "SELECT value FROM {$this->tableName} WHERE name='{$name}' ORDER BY id DESC LIMIT 1";
        $value = $this->run($sql);
        if ($value) {
            return reset($value)->value;
        }
        return '';
    }

}
