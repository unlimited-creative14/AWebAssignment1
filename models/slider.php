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
        $sql = "select * from slider";
        $res = $this->connect->query($sql);
        return $res->fetch_all();
    }
    function getDataByID($id){
        $sql = "select * from slider where id=". $id;
        $res = $this->connect->query($sql);
        if (!$res) return $this->connect->error;
        return $res->fetch_all();
    }
    function insert($img, $b64type, $desc){
        $sql = "insert into slider(img, b64type, des) values(?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $null = null;
        $stmt->bind_param("bss", $null, $b64type, $desc);

        $stmt->send_long_data(0, $img);
        if ($stmt->execute()) return true;
        else {
            return $this->connect->error;
        }
    }
    function remove($id){
        $sql = "delete from slider WHERE id = " . $id;
        $stmt = $this->connect->query($sql);
        if ($stmt) return true ;
        else return $this->connect->error;
    }
    function update($id, $img, $b64type, $desc){
        $sql = "update slider set img=?, b64type=?, des=? where id=?";
        $null = null;
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("bssi", $null, $b64type, $desc, $id);
        $stmt->send_long_data(0, $img);
        if ($stmt->execute()) return true;
        else return $this->connect->error;
    }
}


?>