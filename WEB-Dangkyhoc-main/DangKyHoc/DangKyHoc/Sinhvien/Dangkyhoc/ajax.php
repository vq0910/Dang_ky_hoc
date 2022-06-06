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
						// echo($sql);
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
			// case 'search':
			// 	if (isset($_POST['value'])) {
			// 		$value = $_POST['value'];
			// 		$GetToday = date('Y-m-d H:s:i');

			// 		$sql1='select * from Khoahoc,Chitietkhoahoc,Monhoc where 
			// 		Khoahoc.MKH=Chitietkhoahoc.MKH and Khoahoc.NgayDangKy <="'.$GetToday.'" and Khoahoc.HanDangKy >="'.$GetToday.'" and 
			// 		Monhoc.Tenmonhoc="'.$value.'" and Monhoc.id = Chitietkhoahoc.id_Monhoc';
			// 		$monhocList = executeResult($sql1);
			// 		$index=1;
			// 		foreach($monhocList as $item){
			// 			$sql='select * from Monhoc where id='.$item['id_Monhoc'];
			// 			$chitiet = executeSingleResult($sql);
			// 			if ($chitiet != null) {
			// 				$Tenmonhoc          = $chitiet['Tenmonhoc'];
			// 				$Sotinchi           = $chitiet['Sotinchi'];
			// 				$Hocphi             = $chitiet['Hocphi'];
			// 			}
			// 			$sql2='select * from Giangvien where id='.$item['id_Giangvien'];
			// 			$chitiet2 = executeSingleResult($sql2);
			// 			if ($chitiet2 != null) {
			// 				$Hovaten          = $chitiet2['Hovaten'];
			// 			}
			// 			$sql3='select * from Lop where id='.$item['id_Lop'];
			// 			$chitiet3 = executeSingleResult($sql3);
			// 			if ($chitiet3 != null) {
			// 				$Tenlop          = $chitiet3['Tenlop'];
			// 			}
			// 			$sql4='select * from Hocky where id='.$item['id_Hocky'];
			// 			$chitiet4 = executeSingleResult($sql4);
			// 			if ($chitiet4 != null) {
			// 				$Tenhocky         = $chitiet4['Tenhocky'];
			// 			}
			// 			$sql5='select * from Namhoc where id='.$item['id_Namhoc'];
			// 			$chitiet5 = executeSingleResult($sql5);
			// 			if ($chitiet5 != null) {
			// 				$Tennamhoc          = $chitiet5['Tennamhoc'];
			// 			}
			// 			echo'<tr>
			// 					<td >'.($index++).'</td>
			// 					<td >'.$Tenmonhoc.'</td>
			// 					<td >'.$Hovaten .'</td>
			// 					<td >'.$Tenlop.'</td>
			// 					<td >'.$Tenhocky.'</td>
			// 					<td >'.$Tennamhoc.'</td>
			// 					<td >'.$item['Syso'].'</td>
			// 					<td >Từ '.$item['NgayBatDau'].' đến '.$item['NgayKetThuc'].'</td>
			// 					<td >'.$item['Diadiem'].'</td>
			// 					<td >'.$Sotinchi.'</td>
			// 					<td >'.$Hocphi.'</td>';
			// 				echo'
			// 					<td>';
			// 					$id_ctkh= $item['id'];
			// 					// echo($id_ctkh);
			// 					$query1='select * from Chitietkhoahoc,Ketquadangky where 
			// 					Ketquadangky.id_sv ="'.$id_sv.'" and Ketquadangky.id_Chitietkhoahoc="'.$id_ctkh.'"';
			// 					$rs = executeSingleResult($query1);
			// 					if ($rs != null) {
			// 						echo'<button class="btn btn-warning">Đã Đăng Ký</button>';
			// 					}
			// 					else{
			// 						echo'<button class="btn btn-success" onclick="Dangky('.$item['id'].')">Đăng Ký</button>';
			// 					}
			// 					echo'</td>
			// 				</tr>';
			// 		}
			// 	}
			// 	else
			// 	{
			// 		header('location: index.php');
			// 	}
			// 	break;
		}
	}
}
?>