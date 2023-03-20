<?php
class CategoryModel extends BaseModel
{
    const TABLE = 'categories';
    public function totalCategory(int $id)
    {
        return $this->totalCategoryId($id);
    }

}
?>