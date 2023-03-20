<?php

class ProductModel extends BaseModel
{
    const TABLE = 'products';

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

    public function getLimit(int $index, int $numLimit)
    {
        return $this->limit($index, $numLimit);
    }

    public function getLimitProduct(int $index, int $numLimit, string $condition, string $limitPrice, string $sort){
        return $this->limitProduct($index, $numLimit, $condition, $limitPrice, $sort);
    }

    public function getSearch(string $name)
    {
        return $this->search(self::TABLE, $name);
    }

    public function getNumberNewProduct(int $number)
    {
        return $this->numberNewProduct($number);
    }

    public function getTotalByCategory(int $categoryId, string $limitPrice)
    {
        return $this->totalByCategory(self::TABLE, $categoryId, $limitPrice);
    }
}
?>