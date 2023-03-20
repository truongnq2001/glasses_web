<?php

class ProductModel extends BaseModel
{
    const TABLE = 'products';

    public function getAll()
    {
        return $this->joinTable();
    }

    public function createData(array $data)
    {
        return $this->create(self::TABLE, $data);
    }

    public function updateData(int $id, array $data)
    {
        return $this->updateDataTable(self::TABLE, $id, $data);
    }

    public function deleteProduct(int $id)
    {
        return $this->deleteData(self::TABLE, $id);
    }

    public function getById(int $id)
    {
        return $this->findById($id);
    }

    public function getByCategory(int $categoryId)
    {
        return $this->findByCategory($categoryId);
    }

    public function getTotal()
    {
        return $this->total(self::TABLE);
    }

    public function getLimit(int $index)
    {
        return $this->limit($index);
    }

    public function getSearch(string $name)
    {
        return $this->search(self::TABLE, $name);
    }
}
?>