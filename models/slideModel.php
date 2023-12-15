<?php 
class slideModel extends baseModel{

    public function getAll(){
        $sql = "SELECT * FROM slide ORDER BY idSlide DESC";
        $query = $this->_query($sql);
        return $query;
    }  
    public function insert($duongDan,$hinhAnh){
        $sql = "INSERT INTO slide (duongDan,hinhAnh) values ('$duongDan','$hinhAnh')";
        $query = $this->_query($sql);
        return $query;
    }
    public function delete($id){
        $sql = "DELETE  FROM slide WHERE idSlide = $id";
        if(isset($_SESSION["taiKhoan"]) && $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
     }
    public function update($duongDan,$hinhAnh,$id){
        $sql = "UPDATE slide SET  duongDan = '$duongDan', hinhAnh = '$hinhAnh' WHERE idSlide = '$id'";
        if(isset($_SESSION["taiKhoan"]) && $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function getId($id){
        $sql = "SELECT * FROM slide WHERE idSlide = $id";
        $query = $this->_query($sql);
        return $query;
    }
}
?>