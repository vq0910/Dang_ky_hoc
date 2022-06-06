<?php 
    require_once('../../Db/dbhelper.php');
    
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    $id=$Hovaten=$MSV=$CMND=$Diachi=$Sodienthoai=$id_lop=$id_acc=$Doituong='';
    if (!empty($_POST)) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['Hovaten'])) {
            $Hovaten = $_POST['Hovaten'];
        }
        if (isset($_POST['MSV'])) {
            $MSV = $_POST['MSV'];
        }
        if (isset($_POST['CMND'])) {
            $CMND = $_POST['CMND'];
        }
        if (isset($_POST['Doituong'])) {
            $Doituong = $_POST['Doituong'];
        }
        if (isset($_POST['Diachi'])) {
            $Diachi = $_POST['Diachi'];
        }
        if (isset($_POST['Sodienthoai'])) {
            $Sodienthoai = $_POST['Sodienthoai'];
        }
        if (isset($_POST['id_lop'])) {
            $id_lop = $_POST['id_lop'];
        }
        if (isset($_POST['id_acc'])) {
            $id_acc = $_POST['id_acc'];
        }
        if (!empty($Hovaten)) {
            //Luu vao database
            if ($id == '') {
                $sql1 = 'insert into Sinhvien(Hovaten,MSV,Doituong,CMND,Diachi,Sodienthoai,id_lop,id_acc) 
                values ("'.$Hovaten.'","'.$MSV.'","'.$Doituong.'","'.$CMND.'","'.$Diachi.'","'.$Sodienthoai.'","'.$id_lop.'","'.$id_acc.'")';
                // $sql2 = 'insert into Account(username,password,roles)
                // values ("'.$MSV.'","'.$MSV.'","Sinh viên")';
                // execute($sql2);
            } 
            else {
                $sql1 = 'update Sinhvien set Hovaten ="'.$Hovaten.'",MSV ="'.$MSV.'",Doituong ="'.$Doituong.'",CMND ="'.$CMND.'",Diachi ="'.$Diachi.'",Sodienthoai ="'.$Sodienthoai.'",id_lop ="'.$id_lop.'" where id = '.$id;
            }

            execute($sql1);
            header('Location: index.php');
            // echo($sql2);
            die();
        }
        
    }

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];

        $sql      = 'select * from Sinhvien where id= '.$id;
        $chitiet = executeSingleResult($sql);
        if ($chitiet != null) {
            $id          = $chitiet['id'];
            $Hovaten     = $chitiet['Hovaten'];
            $MSV         = $chitiet['MSV'];
            $Doituong    = $chitiet['Doituong'];
            $CMND        = $chitiet['CMND'];
            $Diachi      = $chitiet['Diachi'];
            $Sodienthoai = $chitiet['Sodienthoai'];
            $id_lop      = $chitiet['id_lop'];
            $id_acc      = $chitiet['id_acc'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php if(isset($_GET['id'])) {?>
            <title>Sửa Sinh Viên</title>
        <?php }else {?>
            <title>Thêm Sinh Viên</title>
        <?php } ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../Assets/Css/main.css">
    </head>
    <body>
        <div class="top-side " style="background-color: #2b3643;">
            <div class="frame-top" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="row  align-items-center page-header justify-content-between">
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class=" d-flex  header-logo">
                            <div class="logo col-md-2 col-2 col-sm-2 text-center">
                                <a href="../index.php">
                                    <img src="../../Assets/Image/logo-small.png" alt="logo" class="img-logo">
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
                                <li><a class="dropdown-item" href="#" id="show">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../Logout.php">Đóng phiên làm việc</a></li>
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
                                    <a href="../index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Đăng ký học">
                                        <i class="fs-4 bi-grid"></i> <span class="ms-1 ">Quản lý khoá học</span> </a>
                                    <ul class="collapse  nav flex-column" id="submenu1" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="../QuanlyKhoaHoc/Chitietkhoahoc/index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Khoá học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Khoá học</span></a>
                                        </li>
                                        <li>
                                            <a href="../QuanlyKhoaHoc/Chitietkhoahoc/index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết khoá học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Chi tiết khoá học</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Danh sách sinh viên đăng ký"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">DS sinh viên dăng ký</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="../QuanlyGiangVien/index.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Giảng Viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1">Quản Lý Giảng Viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php"class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 ">Quản Lý Sinh Viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Quanlymonhoc/index.php"  class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
                                        <i class="bi bi-card-checklist icon-nav"></i> <span class="ms-1 ">Quản lý môn học</span>
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
                                    <h2 class="text-center">Sửa Sinh Viên</h2>
                                <?php }else {?>
                                    <h2 class="text-center">Thêm Sinh Viên</h2>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">Họ và tên:</label>
                                        <input type="text" name="id" hidden="true" value="<?=$id?>">
                                        <input required="true" type="text" class="form-control" id="Hovaten" name="Hovaten" value="<?=$Hovaten?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">MSV:</label>
                                        <select class="form-control" name="MSV" id="MSV">
                                            <option>--Lựa chọn MSV--</option>
                                            <?php 
                                                $sql1  ='select * from Account where roles="Sinh viên"';
                                                $List_msv = executeResult($sql1);
                                                foreach( $List_msv as $item1){
                                                    if($item1['username']== $MSV){
                                                        echo'<option selected value="'.$item1['username'].'">'.$item1['username'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['username'].'">'.$item1['username'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Khoá:</label>
                                        <select class="form-control" name="Doituong" id="Doituong">
                                            <option>--Lựa chọn Khoá--</option>
                                            <?php
                                                echo'<option selected value="<?=$Doituong?>">'.$Doituong.'</option>;
                                                <option>K60</option>;
                                                <option>K61</option>;
                                                <option>K62</option>;
                                                <option>K63</option>;'
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">CMND:</label>
                                        <input required="true" type="text" class="form-control" id="CMND" name="CMND" value="<?=$CMND?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="name">Địa chỉ:</label>
                                        <input required="true" type="text" class="form-control" id="Diachi" name="Diachi" value="<?=$Diachi?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="name">Số điện thoại:</label>
                                        <input required="true" type="text" class="form-control" id="Sodienthoai" name="Sodienthoai" value="<?=$Sodienthoai?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ID_Lớp:</label>
                                        <select class="form-control" name="id_lop" id="id_lop">
                                            <option>--Lựa chọn ID Lớp--</option>
                                            <?php 
                                                $sql1  ='select * from Lop';
                                                $List_lop = executeResult($sql1);
                                                foreach( $List_lop as $item1){
                                                    if($item1['id']==$id_lop){
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
                                        <label for="name">ID_Account:</label>
                                        <select class="form-control" name="id_acc" id="id_acc">
                                            <option>--Lựa chọn ID Account--</option>
                                            <?php 
                                                $sql1  ='select * from Account where roles ="Sinh viên"';
                                                $List_idsv = executeResult($sql1);
                                                foreach( $List_idsv as $item1){
                                                    if($item1['id']==$id_acc){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['username'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['id'].' - '.$item1['username'].'</option>';
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                    
                                    <button class="btn btn-success" style="margin-top: 15px;">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../Assets/Js/toggle.js"></script>
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
            © 2021 CNTT-TLU:
            <a class="text-white" href="#">Thuy Loi University</a>
        </div>
    </footer>
</html>
<!-- class="d-none d-sm-inline " -->