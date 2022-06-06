<?php 
    include('../../../Db/dbhelper.php');
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chi tiết khoá học</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                                <li><a class="dropdown-item" href="#" id="show">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../../Logout.php">Đóng phiên làm việc</a></li>
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
                                    <a href="../../index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Đăng ký học">
                                        <i class="fs-4 bi-grid"></i> <span class="ms-1 ">Quản lý khoá học</span> </a>
                                    <ul class="collapse  nav flex-column" id="submenu1" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="../Khoahoc/index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Khoá học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Khoá học</span></a>
                                        </li>
                                        <li>
                                            <a href="index.php" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết khoá học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Chi tiết khoá học</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Danh sách sinh viên đăng ký"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">DS sinh viên dăng ký</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="../../QuanlyGiangVien/index.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Giảng Viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1">Quản Lý Giảng Viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../QuanlySinhVien/index.php"  class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 ">Quản Lý Sinh Viên</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../Quanlymonhoc/index.php"  class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sinh Viên">
                                        <i class="bi bi-card-checklist icon-nav"></i> <span class="ms-1 ">Quản lý môn học</span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container">
                        <div class="panel panel-primary" style="overflow-x:auto;">
                            <div class="panel-heading">
                                <h2 class="text-center">Chi tiết khoá học</h2>
                            </div>
                            <div class="panel-body">
                                <a href="add.php">
                                    <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Chi tiết khoá Học</button>
                                </a>
                                <table class="table table-bordered table-hover table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MKH</th>
                                            <th>Môn học</th>
                                            <th>Giảng viên</th>
                                            <th>Lớp</th>
                                            <th>Học kỳ</th>
                                            <th>Năm học</th>
                                            <th>Sỹ số</th>
                                            <th>Thời gian</th>
                                            <th>Địa điểm</th>
                                            <th width="40px"></th>
                                            <th width="40px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql1='select * from Chitietkhoahoc';
                                            $monhocList = executeResult($sql1);
                                            $index=1;
                                            foreach($monhocList as $item){
                                                $sql='select * from Monhoc where id='.$item['id_Monhoc'];
                                                $chitiet = executeSingleResult($sql);
                                                if ($chitiet != null) {
                                                    $Tenmonhoc          = $chitiet['Tenmonhoc'];
                                                }
                                                $sql2='select * from Giangvien where id='.$item['id_Giangvien'];
                                                $chitiet2 = executeSingleResult($sql2);
                                                if ($chitiet2 != null) {
                                                    $Hovaten          = $chitiet2['Hovaten'];
                                                }
                                                $sql3='select * from Lop where id='.$item['id_Lop'];
                                                $chitiet3 = executeSingleResult($sql3);
                                                if ($chitiet3 != null) {
                                                    $Tenlop          = $chitiet3['Tenlop'];
                                                }
                                                $sql4='select * from Hocky where id='.$item['id_Hocky'];
                                                $chitiet4 = executeSingleResult($sql4);
                                                if ($chitiet4 != null) {
                                                    $Tenhocky         = $chitiet4['Tenhocky'];
                                                }
                                                $sql5='select * from Namhoc where id='.$item['id_Namhoc'];
                                                $chitiet5 = executeSingleResult($sql5);
                                                if ($chitiet5 != null) {
                                                    $Tennamhoc          = $chitiet5['Tennamhoc'];
                                                }
                                                echo'<tr>
                                                        <td >'.($index++).'</td>
                                                        <td >'.$item['MKH'].'</td>
                                                        <td >'.$Tenmonhoc.'</td>
                                                        <td >'.$Hovaten .'</td>
                                                        <td >'.$Tenlop.'</td>
                                                        <td >'.$Tenhocky.'</td>
                                                        <td >'.$Tennamhoc.'</td>
                                                        <td >'.$item['Syso'].'</td>
                                                        <td >'.$item['NgayBatDau'].'->'.$item['NgayKetThuc'].'</td>
                                                        <td >'.$item['Diadiem'].'</td>
                                                        <td>
                                                            <a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger" onclick="deleteChitietkhoahoc('.$item['id'].')">Xoá</button>
                                                        </td>
                                                    </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../Assets/Js/toggle.js" async defer></script>

        <script type="text/javascript">
            function deleteChitietkhoahoc(id){
                var option=confirm("Bạn có chắc muốn xoá danh mục này không ?")
                if(!option)
                {
                    return;
                }
                // console.log(id)
                $.post('ajax.php',
                {
                    'id': id,
                    'action': 'delete'
                },function(data)
                {
                    location.reload()
                })
            }
        </script>
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