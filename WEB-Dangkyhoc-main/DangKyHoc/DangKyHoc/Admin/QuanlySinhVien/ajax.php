<?php
require_once('../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

                    // $query  = 'select * from Sinhvien where id= '.$id;
                    // $row = executeSingleResult($query);
                    // if ($row != null) {
                    //     $msv = $row['MSV'];
                    // }
                    // $sql = 'delete from Account where username= '.$msv;
                    // execute($sql);
					$sql1 = 'delete from Sinhvien where id = '.$id;
					execute($sql1);

					
				}
				break;
		}
	}
}