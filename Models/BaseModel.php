<?php
class BaseModel extends Database
{

    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
     /**
     * Lay tat ca du lieu trong bang
     */
    public function all(string $table, array $select, array $orderBys, int $limit)
    {
        $columns = implode(',',$select);
        $orderByString = implode(' ',$orderBys);
        $sql = "SELECT $columns FROM $table ORDER BY $orderByString LIMIT $limit";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    /**
     * Lay du lieu tu 2 bang join nhau
     */
    public function joinTable()
    {
        $sql = "SELECT p.id, p.name, p.price, p.image, p.category_id, c.name AS category, p.create_at, p.update_at
                FROM products AS p JOIN categories AS c
                ON category_id = c.id";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    /**
     * Lay ra toan bo san pham trong danh muc
     */
    public function findByCategory(int $category_id)
    {
        $sql = "SELECT p.id, p.name, p.price, p.image, p.category_id, c.name AS category, p.create_at, p.update_at
                FROM products AS p JOIN categories AS c
                ON category_id = c.id 
                WHERE p.category_id = $category_id";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    /**
     * Lay ra mot ban ghi dùng id trong bang ket hop product va categories
     */
    public function findById(int $id)
    {
        $sql = "SELECT p.id, p.name, p.price, p.image, c.name AS category, p.create_at, p.update_at
                FROM products AS p JOIN categories AS c
                ON category_id = c.id 
                WHERE p.id = $id LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
     /**
     * Lay ra mot ban ghi trong bang
     */
    public function find(string $tableName, int $id)
    {
        $sql = "SELECT * FROM $tableName WHERE id = $id LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    /**
     * Them du lieu vao bang
     */
    public function create(string $tableName, array $data)
    {
        $columns = implode(',', array_keys($data));
        $newValues = array_map(function($valueElement){
            return "'".$valueElement."'";
        }, array_values($data));
        $values = implode(',', $newValues);
        $sql = "INSERT INTO $tableName($columns) VALUES($values)";
        $this->_query($sql);
    }
    /**
     * Update du lieu vao bang
     */
    public function updateDataTable(string $tableName, int $id, array $data)
    {
        $dataSets = [];
        foreach ($data as $key => $value) {
            array_push($dataSets, "$key = '".$value."'");
        };
        echo'<pre>';
        print_r($dataSets);
        $dataString = implode(',', $dataSets);
        $sql = "UPDATE $tableName SET $dataString WHERE id = $id ";
        $this->_query($sql);
    }
    /**
     * Delete du lieu khoi bang
     */
    public function deleteData(string $tableName, int $id)
    {
        $sql = "DELETE FROM $tableName WHERE id = $id";
        $this->_query($sql);
    }
    /**
     * Lay tong so ban ghi trong bang 
     */
    public function total(string $tableName)
    {
        $sql = "SELECT COUNT(id) AS total_records FROM $tableName";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        $total = 0;
        if($data != null && count($data) > 0){
            $total = $data[0]['total_records'];
        }
        return $total;
    }
    /**
     * Limit so ban ghi trong bang 
     */
    public function limit(int $index)
    {
        $sql = "SELECT p.id, p.name, p.price, p.image, p.category_id, c.name AS category, p.create_at, p.update_at
                FROM products AS p JOIN categories AS c
                ON category_id = c.id LIMIT $index ,3";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    /**
     * Tim kiem trong bang 
     */
    public function search(string $tableName, string $name)
    {
        $sql = "SELECT * FROM $tableName WHERE name LIKE '%$name%'";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    private function _query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }
}
?>