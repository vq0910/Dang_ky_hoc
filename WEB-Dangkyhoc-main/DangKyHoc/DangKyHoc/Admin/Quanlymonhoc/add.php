<?php 
    require_once('../../Db/dbhelper.php');
    
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    $id=$Tenmonhoc=$Sotinchi=$Hocphi=$id_khoa='';
    if (!empty($_POST)) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['Tenmonhoc'])) {
            $Tenmonhoc = $_POST['Tenmonhoc'];
        }
        if (isset($_POST['Sotinchi'])) {
            $Sotinchi = $_POST['Sotinchi'];
        }
        if (isset($_POST['Hocphi'])) {
            $Hocphi = $_POST['Hocphi'];
        }
        if (isset($_POST['id_khoa'])) {
            $id_khoa= $_POST['id_khoa'];
        }
        if (!empty($Tenmonhoc)) {
            //Luu vao database
            if ($id == '') {
                $sql1 = 'insert into Monhoc(Tenmonhoc,Sotinchi,Hocphi,id_khoa) 
                values ("'.$Tenmonhoc.'","'.$Sotinchi.'","'.$Hocphi.'","'.$id_khoa.'")';
            } 
            else {
                $sql1 = 'update Monhoc set Tenmonhoc ="'.$Tenmonhoc.'",Sotinchi ="'.$Sotinchi.'",Hocphi ="'.$Hocphi.'",id_khoa ="'.$id_khoa.'" where id = '.$id;
            }

            execute($sql1);
            header('Location: index.php');
            // echo($sql2);
            die();
        }
        
    }

    if (isset($_GET['id'])) {
        $id       = $_GET['id'];

        $sql      = 'select * from Monhoc where id= '.$id;
        $chitiet = executeSingleResult($sql);
        if ($chitiet != null) {
            $id          = $chitiet['id'];
            $Tenmonhoc   = $chitiet['Tenmonhoc'];
            $Sotinchi    = $chitiet['Sotinchi'];
            $Hocphi      = $chitiet['Hocphi'];
            $id_khoa     = $chitiet['id_khoa'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php if(isset($_GET['id'])) {?>
            <title>Sửa Môn Học</title>
        <?php }else {?>
            <title>Thêm Môn Học</title>
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
                                    <a href="../QuanlySinhVien/index.php"class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 ">Quản Lý Sinh Viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
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
                                    <h2 class="text-center">Sửa Môn Học</h2>
                                <?php }else {?>
                                    <h2 class="text-center">Thêm Môn Học</h2>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">Tên môn học:</label>
                                        <input type="text" name="id" hidden="true" value="<?=$id?>">
                                        <input required="true" type="text" class="form-control" id="Tenmonhoc" name="Tenmonhoc" value="<?=$Tenmonhoc?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Số tín chỉ:</label>
                                        <input required="true" type="text" class="form-control" id="Sotinchi" name="Sotinchi" value="<?=$Sotinchi?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Học phí:</label>
                                        <input required="true" type="text" class="form-control" id="Hocphi" name="Hocphi" value="<?=$Hocphi?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Khoa:</label>
                                        <select class="form-control" name="id_khoa" id="id_khoa">
                                            <option>--Lựa chọn Khoa--</option>
                                            <?php 
                                                $sql1  ='select * from Khoa ';
                                                $List_khoa = executeResult($sql1);
                                                foreach( $List_khoa as $item1){
                                                    if($item1['id']== $id_khoa){
                                                        echo'<option selected value="'.$item1['id'].'">'.$item1['tenkhoa'].'</option>';
                                                    }
                                                    else{
                                                        echo'<option value="'.$item1['id'].'">'.$item1['tenkhoa'].'</option>';
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