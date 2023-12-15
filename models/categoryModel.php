<?php 
class categoryModel extends baseModel{

    public function getAll(){
        $sql = "SELECT * FROM danhmuc";
        $query = $this->_query($sql);
        return $query;
    }
    public function pageCategory($begin,$count){
        $sql = "SELECT * FROM danhmuc ORDER BY idDanhMuc DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getId($id){
        $sql = "SELECT * FROM danhmuc WHERE idDanhMuc = $id";
        $query = $this->_query($sql);
        return $query;
    }
    public function delete($id){
       $sql = "DELETE  FROM danhmuc WHERE idDanhMuc = $id";
       if(isset($_SESSION["taiKhoan"]) && $_SESSION['idQuyen'] == 1){
        $query = $this->_query($sql);
        return $query;
    }  
    }
    public function insert($tenDanhMuc){
        $sql = "INSERT INTO danhmuc (tenDanhMuc) values ('$tenDanhMuc')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($tenDanhMuc,$id){
        $sql = "UPDATE danhmuc SET  tenDanhMuc = '$tenDanhMuc' WHERE idDanhMuc = '$id'";
        if(isset($_SESSION["taiKhoan"]) && $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function searchCategory($str){
        $sql = "SELECT * FROM danhmuc WHERE MATCH(tenDanhMuc) against('$str' IN BOOLEAN mode)";
        $query = $this->_query($sql);
        return $query;
    }
}
?>