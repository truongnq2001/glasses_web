
<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';
    public function getAll($select, $orderBys, $limit){
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

}
?>