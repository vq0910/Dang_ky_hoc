<?php
require_once('../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					$sql1 = 'delete from Monhoc where id = '.$id;
					execute($sql1);

					
				}
				break;
		}
	}
}