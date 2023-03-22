<?php
class CommentModel extends BaseModel
{
    const TABLE = 'comments';
    public function createComment(array $data)
    {
        return $this->create(self::TABLE, $data);
    }

    public function getLimitComment(int $productId, int $index, int $numLimit)
    {
        return $this->limitItemTable(self::TABLE, $productId, $index, $numLimit);
    }
}
?>