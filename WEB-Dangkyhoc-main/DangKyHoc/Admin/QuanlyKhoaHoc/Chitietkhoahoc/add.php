<?php 
    require_once('../../../Db/dbhelper.php');
    
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    $id=$MKH= $Monhoc= $Giangvien=$Lop=$Hocky=$Namhoc=$Syso=$NgayBatDau=$NgayKetThuc=$Diadiem='';
    if (!empty($_POST)) {
        if (isset($_POST['MKH'])) {
            $MKH = $_POST['MKH'];
        }
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['id_Monhoc'])) {
            $id_Monhoc = $_POST['id_Monhoc'];
        }
        if (isset($_POST['id_Giangvien'])) {
            $id_Giangvien = $_POST['id_Giangvien'];
        }
        if (isset($_POST['id_Lop'])) {
            $id_Lop = $_POST['id_Lop'];
        }
        if (isset($_POST['id_Hocky'])) {
            $id_Hocky = $_POST['id_Hocky'];
        }
        if (isset($_POST['id_Namhoc'])) {
            $id_Namhoc = $_POST['id_Namhoc'];
        }
        if (isset($_POST['Syso'])) {
            $Syso = $_POST['Syso'];
        }
        if (isset($_POST['NgayBatDau'])) {
            $NgayBatDau = $_POST['NgayBatDau'];
        }
        if (isset($_POST['NgayKetThuc'])) {
            $NgayKetThuc = $_POST['NgayKetThuc'];
        }
        if (isset($_POST['Diadiem'])) {
            $Diadiem = $_POST['Diadiem'];
        }
        

        
        if (!empty($MKH)) {
            // $created_at = $updated_at = date('Y-m-d H:s:i');
            //Luu vao database
            if ($id == '') {
                $sql1 = 'insert into Chitietkhoahoc(MKH,id_Monhoc,id_Giangvien,id_Lop,id_Hocky,id_Namhoc,Syso,NgayBatDau,NgayKetThuc,Diadiem) 
                values ("'.$MKH.'","'.$id_Monhoc.'","'.$id_Giangvien.'","'.$id_Lop.'","'.$id_Hocky.'","'.$id_Namhoc.'","'.$Syso.'","'.$NgayBatDau.'","'.$NgayKetThuc.'","'.$Diadiem.'")';
            } 
            else {
                $sql1 = 'update Chitietkhoahoc set MKH ="'.$MKH.'",id_Monhoc ="'.$id_Monhoc.'",id_Giangvien ="'.$id_Giangvien.'",id_Lop ="'.$id_Lop.'",id_Hocky ="'.$id_Hocky.'"
                ,id_Namhoc ="'.$id_Namhoc.'",Syso ="'.$Syso.'",NgayBatDau ="'.$NgayBatDau.'",NgayKetThuc ="'.$NgayKetThuc.'",Diadiem = "'.$Diadiem.'" where id = '.$id;
               
            }

            execute($sql1);

            header('Location: index.php');
            // echo($sql1);
            die();
        }
        
    }

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];
        $sql      = 'select * from Chitietkhoahoc where id = '.$id;
        $chitiet = executeSingleResult($sql);
        if ($chitiet != null) {
            $id           = $chitiet['id'];
            $MKH          = $chitiet['MKH'];
            $id_Monhoc    = $chitiet['id_Monhoc'];
            $id_Giangvien = $chitiet['id_Giangvien'];
            $id_Lop       = $chitiet['id_Lop'];
            $id_Hocky     = $chitiet['id_Hocky'];
            $id_Namhoc    = $chitiet['id_Namhoc'];
            $Syso         = $chitiet['Syso'];
            $NgayBatDau   = $chitiet['NgayBatDau'];
            $NgayKetThuc  = $chitiet['NgayKetThuc'];
            $Diadiem      = $chitiet['Diadiem'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php if(isset($_GET['id'])) {?>
            <title>S???a chi ti???t kho?? h???c</title>
        <?php }else {?>
            <title>Th??m chi ti???t kho?? h???c</title>
        <?php } ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../Assets/Css/main.css">
    </head>
    <body>
        <div class="top-side " style="background-color: #2b3643;">
            <div class="frame-top" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="row  align-items-center page-header justify-content-between">
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class=" d-flex  header-logo">
                            <div class="logo col-md-2 col-2 col-sm-2 text-center">
                                <a href="../../index.php">
                                    <img src="../../../Assets/Image/logo-small.png" alt="logo" class="img-logo">
                                </a>
                            </div>
                            <div class="menu-toggle col-md-4 col-4 col-sm-4 text-center">
                                <i class="bi bi-list icon-toggle" id="show" ></i>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($user['username'])){?>
                    <div id="Dang-nhap " class="col-md-6 col-6 col-sm-6 " style="font-size:15px;color:grey;padding-top: 10px;">
                        <div class="dropdown pb-4 text-end">
                            <div class="block">
                            <?php if($user['roles']=='admin'){?>
                                <a href="#" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    <span class=""><?php echo $user['username'] ?></span> 
                                    <span class="d-none d-sm-inline mx-1">Role: <?php echo $user['roles'] ?></span> 
                                </a>
                            <?php }?>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
                                <li><a class="dropdown-item" href="#" id="show">Th??ng tin t??i kho???n</a></li>
                                <li><a class="dropdown-item" href="#">?????i m???t kh???u</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../../Logout.php">????ng phi??n l??m vi???c</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar" style="background-color: #2b3643;">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <?php if($user['roles']=='admin'){?>
                            <ul class="navbar-nav nav-pills" id="menu">
                                <li class="nav-item">
                                    <a href="../../index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang ch???">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang ch???</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="????ng k?? h???c">
                                        <i class="fs-4 bi-grid"></i> <span class="ms-1 ">Qu???n l?? kho?? h???c</span> </a>
                                    <ul class="collapse  nav flex-column" id="submenu1" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="../Khoahoc/index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Kho?? h???c"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Kho?? h???c</span></a>
                                        </li>
                                        <li>
                                            <a href="index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi ti???t kho?? h???c"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Chi ti???t kho?? h???c</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Danh s??ch sinh vi??n ????ng k??"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">DS sinh vi??n d??ng k??</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="../../QuanlyGiangVien/index.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Qu???n L?? Gi???ng Vi??n">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1">Qu???n L?? Gi???ng Vi??n</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../QuanlySinhVien/index.php"class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Qu???n L?? Sinh Vi??n">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 ">Qu???n L?? Sinh Vi??n</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../Quanlymonhoc/index.php"  class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Qu???n L?? Sinh Vi??n">
                                        <i class="bi bi-card-checklist icon-nav"></i> <span class="ms-1 ">Qu???n l?? m??n h???c</span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php if(isset($_GET['id'])) {?>
                                    <h2 class="text-center">S???a chi ti???t kho?? h???c </h2>
                                <?php }else {?>
                                    <h2 class="text-center">Th??m chi ti???t kho?? h???c </h2>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">MKH:</label>
                                        <input type="text" name="id"   hidden="true" value="<?=$id?>">
                                        <select class="form-control" name="MKH" id="MKH">
                                            <option>--L???a ch???n MKH--</option>
                                            <?php 
                                                $sql1  ='select * from Khoahoc';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['MKH']==$MKH){
                                                        echo'<option selected value="'.$item1['MKH'].'">'.$item1['MKH'].' - '.$item1['Tenkhoahoc'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['MKH'].'">'.$item1['MKH'].' - '.$item1['Tenkhoahoc'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">M??n h???c:</label>
                                        <select class="form-control" name="id_Monhoc" id="id_Monhoc">
                                            <option>--L???a ch???n M??n h???c--</option>
                                            <?php 
                                                $sql1  ='select * from Monhoc';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['id']==$id_Monhoc){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].'- '.$item1['Tenmonhoc'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].'- '.$item1['Tenmonhoc'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Gi???ng vi??n:</label>
                                        <select class="form-control" name="id_Giangvien" id="id_Giangvien">
                                            <option>--L???a ch???n Gi???ng vi??n--</option>
                                            <?php 
                                                $sql1  ='select * from Giangvien';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['id']==$id_Giangvien){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Hovaten'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Hovaten'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">L???p:</label>
                                        <select class="form-control" name="id_Lop" id="id_Lop">
                                            <option>--L???a ch???n L???p--</option>
                                            <?php 
                                                $sql1  ='select * from Lop';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['id']==$id_Lop){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tenlop'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tenlop'].'</option>';
                                                    }
                                                }
                                            ?>  
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">H???c k???:</label>
                                        <select class="form-control" name="id_Hocky" id="id_Hocky">
                                            <option>--L???a ch???n H???c k???--</option>
                                            <?php 
                                                $sql1  ='select * from Hocky';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['id']==$id_Hocky){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tenhocky'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tenhocky'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">N??m h???c:</label>
                                        <select class="form-control" name="id_Namhoc" id="id_Namhoc">
                                            <option>--L???a ch???n N??m h???c--</option>
                                            <?php 
                                                $sql1  ='select * from Namhoc';
                                                $List_khoahoc = executeResult($sql1);
                                                foreach( $List_khoahoc as $item1){
                                                    if($item1['id']==$id_Namhoc){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tennamhoc'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['Tennamhoc'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">S??? s???:</label>
                                        <input required="true" type="number" class="form-control" id="syso" name="Syso" value="<?=$Syso?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Ng??y b???t ?????u:</label>
                                        <input required="true" type="date" class="form-control" id="NgayBatDau" name="NgayBatDau" value="<?=$NgayBatDau?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Ng??y k???t th??c:</label>
                                        <input required="true" type="date" class="form-control" id="NgayKetThuc" name="NgayKetThuc" value="<?=$NgayKetThuc?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">?????a ??i???m:</label>
                                        <input required="true" type="text" class="form-control" id="diadiem" name="Diadiem" value="<?=$Diadiem?>">
                                    </div>
                                    <button class="btn btn-success" style="margin-top: 15px;">L??u</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../Assets/Js/toggle.js"></script>
    </body>
    <footer class="text-center text-white" style="background-color: #2b3643;">
        <div class="container p-4 pb-0">
          <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-facebook"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-twitter"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-google"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-instagram"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-github"></i></a>
          </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2021 CNTT-TLU:
            <a class="text-white" href="#">Thuy Loi University</a>
        </div>
    </footer>
</html>
<!-- class="d-none d-sm-inline " -->