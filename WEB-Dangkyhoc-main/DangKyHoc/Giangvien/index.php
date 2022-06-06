<?php 
    include('../Db/dbhelper.php');
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    if(isset($user['username'])){
         if($user['roles']=='Giảng viên')
        {
            $sql = 'SELECT * FROM Account INNER JOIN Giangvien ON Giangvien.id_acc='.$user['id'];
        
            $query = mysqli_query($con,$sql);
            $data  = mysqli_fetch_array($query);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang Giảng Viên</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../Assets/Css/main.css">
    </head>
    <body>
        <div class="top-side " style="background-color: #2b3643;">
            <div class="frame-top" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="row  align-items-center page-header justify-content-between">
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class=" d-flex  header-logo">
                            <div class="logo col-md-2 col-2 col-sm-2 text-center">
                                <a href="">
                                    <img src="../Assets/Image/logo-small.png" alt="logo" class="img-logo">
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
                            <?php if($user['roles']=='Giảng viên'){?>
                                <a href="#" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    <span class=""><?php echo $data['Hovaten'] ?></span> 
                                    <span class="d-none d-sm-inline mx-1">(<?php echo $data['MGV']?>)</span> 
                                    <span class="d-none d-sm-inline mx-1">Role: <?php echo $user['roles'] ?></span> 
                                </a>
                            <?php }?>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
                                <li><a class="dropdown-item" href="#" id="show">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../Logout.php">Đóng phiên làm việc</a></li>
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
                        <?php if($user['roles']=='Giảng viên') { ?>
                            <ul class="navbar-nav nav-pills" id="menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Danhsachsinhvien/danhsachsinhvien.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Danh sách sinh viên">
                                        <i class="bi bi-card-checklist icon-nav"></i> <span class="ms-1">Danh sách sinh viên</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Thông tin giảng viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1">Thông tin giảng viên</span> 
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col py-3">
                    <?php include('../News.php'); ?>
                </div>
            </div>
        </div>
        <script src="../Assets/Js/toggle.js" async defer></script>
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