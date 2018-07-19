<?php
error_reporting(0);
class dataBase {

    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $db = "car_db";

    public function __construct() {
        $con = new mysqli($this->host, $this->username, $this->password, $this->db);

        $this->dbh = $con;
        if (mysqli_connect_error()) {
            echo"Database connection Failed";
            exit;
        }
    }

    public function addModel($values) {
     
        //mysqli_query($this->dbh, "insert into models (`color`,`remarks`,`Manufacturing_Year`,`manufacture_id`,`registration_no`) values('" . $values['color'] . "','" . $values['remarks'] . "','" . $values['Manufacturing_Year'] . "','" . $values['manufacture'] . "','" . $values['registration_no'] . "')");
		$sql=mysqli_query($this->dbh,"insert into models(`menu_id`,`model`,`reg_no`,`menu_year`,`remark`,`color`)values('".$values['manu_id']."','".$values['model']."','".$values['reg_no']."','".strtotime($values['manu_year'])."','".$values['remarks']."','".$values['color']."')");
        /*  if($sql=="1")
		{
         return 1;
		}else{
			return 0;
		}  */
		return $sql;
		
    }

    public function manufactureList() {
        $types = array();
        $sql = "SELECT id,name FROM manufacture";
        $result = $this->dbh->query($sql);
        while ($rows[] = mysqli_fetch_assoc($result));
        return $rows;
    }
	public function modalList() {
        $types = array();
        $sql = "SELECT * FROM models where `active`='0'";
        $result = $this->dbh->query($sql);
        while ($rows[] = mysqli_fetch_assoc($result));
        return $rows;
    }
	function manu_list($id){
		$sql = "SELECT * FROM manufacture where `id`='$id'";
		$result = $this->dbh->query($sql);
		$qq=mysqli_fetch_array($result);
		return $qq['name'];
	}
     public function Manufacture($man, $rem, $date) {
        mysqli_query($this->dbh, "insert into manufacture (`name`,`details`,`date`) values('" . $man . "','" . $rem . "','" . $date . "')");
        echo $this->db->last_query();
        die;
    }
	public function sold($id)
	{
		$sql= mysqli_query($this->dbh, "update `models` set `active`='1' where `id`='".$id."'");
		return $sql;
	}
}

$obj = new dataBase;
?>