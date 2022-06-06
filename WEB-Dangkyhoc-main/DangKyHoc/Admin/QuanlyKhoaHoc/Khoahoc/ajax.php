<?php
require_once('../../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					$sql = 'delete from Khoahoc where MKH = '.$id;
					execute($sql);
					// $sql1 = 'delete from Chitietkhoahoc where MKH = '.$id;
					// execute($sql);
				}
				break;
		}
	}
}