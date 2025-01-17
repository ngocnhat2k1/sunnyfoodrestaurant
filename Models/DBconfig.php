<?php
class DBconfig
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'sunnyfood';
    private $conn = NULL;

    public function connect()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo "Kết nối thất bại";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    public function getNumRows($tbl)
    {
        $sql = "SELECT * FROM $tbl";
        return mysqli_num_rows($this->conn->query($sql));
    }
    public function selectOrderByIdCustomer($idkhachhang)
    {
        $sql = "SELECT * FROM `don_hang` WHERE `id_khach_hang` = '$idkhachhang'";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function getRowsByConditon($tbl, $dtbName, $value)
    {
        $sql = "SELECT * FROM $tbl WHERE `$dtbName` = '$value'";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function insertDetailOrder($id_mon_an, $so_luong, $giatien, $id_don_hang)
    {
        $sql = "INSERT INTO `chi_tiet_don_hang`(`id_mon_an`, `so_luong`, `giatien`, `id_don_hang`) VALUES ('$id_mon_an','$so_luong','$giatien','$id_don_hang')";
        $this->conn->query($sql);
    }
    public function insertOrder($id_dh, $id_kh, $ngay_dat_hang, $dcn, $tn, $sdtn)
    {
        $sql = "INSERT INTO `don_hang`(`id_don_hang`, `id_khach_hang`, `ngay_dat_hang`, `dia_chi_nhan_hang`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`) VALUES ('$id_dh','$id_kh','$ngay_dat_hang','$dcn','$tn','$sdtn')";
        $this->conn->query($sql);
    }
    public function selectAllCustomer()
    {
        $sql = "SELECT * FROM `khach_hang`";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function selectAllFood()
    {
        $sql = "SELECT * FROM `mon_an`";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function selectAllOrder()
    {
        $sql = "SELECT * FROM `don_hang`";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function selectAllDetailById($id)
    {
        $sql = "SELECT * FROM `chi_tiet_don_hang` WHERE `id_don_hang` = '$id'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
