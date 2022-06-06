<?php
require_once('../../Db/dbhelper.php');
$user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

if(isset($user['username'])){
    if($user['roles']=='Sinh viên')
    {
        $sql = 'SELECT * FROM Account INNER JOIN Sinhvien ON Sinhvien.id_acc='.$user['id'];
        
        $query = mysqli_query($con,$sql);
        $data  = mysqli_fetch_array($query);
		$id_sv =$data['id'];
    }
}
// echo($user['id']);
if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'add':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					if(isset($user['username'])){
						$sql = 'insert into Ketquadangky(id_sv,id_Chitietkhoahoc) 
						values ("'.$id_sv.'","'.$id.'")';
						
					}
					execute($sql);
				}
				break;
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					if(isset($user['username'])){
						$sql = 'delete from Ketquadangky where id_dk='.$id;
					}
					execute($sql);
				}
				break;
		}
	}
}
?>