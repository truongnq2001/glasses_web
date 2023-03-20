
<?php
class UserModel extends BaseModel
{
    const TABLE = 'users';
    public function getAll(array $select, array $orderBys, int $limit)
    {
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }
    public function createAccount(array $data)
    {
        return $this->create(self::TABLE, $data);
    }
}
?>