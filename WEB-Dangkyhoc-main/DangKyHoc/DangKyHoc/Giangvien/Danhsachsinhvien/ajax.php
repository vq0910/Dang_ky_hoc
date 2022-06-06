<!-- <?php 
    if (!empty($_POST)) {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
    
            switch ($action) {
                case 'add':
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
    
                        $qr='select * from Chitietkhoahoc,Monhoc,Ketquadangky where 
                                            Chitietkhoahoc.id_Monhoc = Monhoc.id and Ketquadangky.id_Chitietkhoahoc=Chitietkhoahoc.id and Chitietkhoahoc.id_Giangvien="'.$data['id'].'" and Monhoc.id="'.$id.'"'; 
                                            $List1 = executeResult($qr);
                                            $index=1;
                                            foreach($List1 as $item1){
                                                $sql='select * from Sinhvien where id='.$item1['id_sv'];
                                                $chitiet = executeSingleResult($sql);
                                                if ($chitiet != null) {
                                                    $Tensinhvien = $chitiet['Hovaten'];
                                                    $MSV         = $chitiet['MSV'];
                                                    $Khoa        = $chitiet['Doituong'];
                                                }

                                                $sql2='select * from Lop where id='.$item1['id_Lop'];
                                                $chitiet2 = executeSingleResult($sql2);
                                                if ($chitiet2 != null) {
                                                    $Tenlop   = $chitiet2['Tenlop'];
                                                }
                                                echo'<tr>
                                                        <td >'.($index++).'</td>
                                                        <td >'.$Tensinhvien.'</td>
                                                        <td >'.$MSV.'</td>
                                                        <td >'.$Tenlop.'</td>
                                                        <td >'.$Khoa.'</td>
                                                    </tr>';
                                            }
                    }
                    break;
            }
        }
    }
?> -->