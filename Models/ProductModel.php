<?php
class ProductModel extends BaseModel
{
    const TABLE = 'products';
    public function getAll(){
        return $this->joinTable();
    }
    public function createData($data){
        return $this->create(self::TABLE, $data);
    }
    public function updateData($id, $data){
        return $this->updateDataTable(self::TABLE, $id, $data);
    }
    public function getById($id){
        return $this->findById($id);
    }
    public function getByCategory($category_id){
        return $this->findByCategory($category_id);
    }
    public function getTotal(){
        return $this->total(self::TABLE);
    }
    public function getLimit($index){
        return $this->limit($index);
    }
    public function getSearch($name){
        return $this->search(self::TABLE, $name);
    }
}
?>