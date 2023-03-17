<?php
class Database
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DB = 'demo_web';

    public function connect(){
        $conn = mysqli_connect(self::HOST, self::USERNAME, 
        self::PASSWORD, self::DB);

        mysqli_set_charset($conn, "utf8");
        if(mysqli_connect_errno() === 0){
            return $conn;
        }
        return false;
    }


}

?>