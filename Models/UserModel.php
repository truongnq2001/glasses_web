<?php
class UserModel extends BaseModel
{
    const TABLE = 'users';

    public function getAll(array $selectColumns, array $orderBy, int $limit)
    {
        return $this->all(self::TABLE, $selectColumns, $orderBy, $limit);
    }

    public function getLimitUser(int $index, int $limit)
    {
        return $this->limitUser(self::TABLE, $index, $limit);
    }

    public function createAccount(array $data)
    {
        return $this->create(self::TABLE, $data);
    }

    public function getCheckLogin(string $username, string $password)
    {
        return $this->checkLogin(self::TABLE, $username, $password);
    }
}
?>