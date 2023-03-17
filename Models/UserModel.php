
<?php
class UserModel extends BaseModel
{
    const TABLE = 'users';
    public function getAll($select, $orderBys, $limit){
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

}
?>