<?php
require_once('../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

                    // $query  = 'select * from Giangvien where id= '.$id;
                    // $row = executeSingleResult($query);
                    // if ($row != null) {
                    //     $mgv = $row['MGV'];
                    // }
                    // $sql = 'delete from Account where username= '.$mgv;
                    // execute($sql);
					$sql1 = 'delete from Giangvien where id = '.$id;
					execute($sql1);

					
				}
				break;
		}
	}
}