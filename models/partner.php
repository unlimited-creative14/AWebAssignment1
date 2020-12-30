<?php
class sliderDB {
    private $connect;
    
    function __construct($host, $uname, $pass, $dbname)
    {
        $this->connect = new mysqli($host, $uname, $pass, $dbname);
        if ($this->connect->error){
            die("Connection failed: " . $this->connect->connect_error);
        }
    }
    function getData(){
        $sql = "select * from partner";
        $res = $this->connect->query($sql);
        return $res->fetch_all();
    }
    function getDataByID($id){
        $sql = "select * from partner where id="  . $id;
        $res = $this->connect->query($sql);
        if (!$res) return $this->connect->error;
        return $res->fetch_all();
    }
    function insert($namep, $img, $b64type, $desc){
        $sql = "insert into partner(namep, img, b64type, des) values(?,?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $null = null;
        $stmt->bind_param("sbss", $namep, $null, $b64type, $desc);

        $stmt->send_long_data(1, $img);
        if ($stmt->execute()) return true;
        else {
            return $this->connect->error;
        }
    }
    function remove($id){
        $sql = "delete from partner WHERE id =" . $id;
        $stmt = $this->connect->query($sql);
        if ($stmt) return true ;
        else return $this->connect->error;
    }
    function update($namep, $newnamep, $img, $b64type, $desc){
        $sql = "update partner set namep=?, img=?, b64type=?, des=? where namep=?";
        $null = null;
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("sbsss", $newnamep, $null, $b64type, $desc, $namep);
        $stmt->send_long_data(1, $img);
        if ($stmt->execute()) return true;
        else return $this->connect->error;
    }
}


?>