<?php 
    include('../../Db/dbhelper.php');
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    if(isset($user['username'])){
        if($user['roles']=='Giảng viên')
        {
            $sql = 'SELECT * FROM Account INNER JOIN Giangvien ON Giangvien.id_acc='.$user['id'];
            // ECHO($sql);
            $query = mysqli_query($con,$sql);
            $data  = mysqli_fetch_array($query);
            // echo($data['id']);
        }
    }
    else{
        header('location: ../../Login.php');
    }
    $tab_menu=$tab_content='';
    $query1='select * from Chitietkhoahoc where Chitietkhoahoc.id_Giangvien="'.$data['id'].'" Order by Chitietkhoahoc.id ASC'; 
    $rs=Result($query1);
    // $List = executeResult($query1);
    $count=0;
    while($rows =mysqli_fetch_array($rs))
    {
        // echo($rows);
    // foreach($List as $item1){
        $sqll='select * from Monhoc where id='.$rows['id_Monhoc'];
        $chitiet = executeSingleResult($sqll);
        //  echo($chitiet);

        if ($chitiet != null) {
            $Tenmonhoc   = $chitiet['Tenmonhoc'];
            if($count==0)
            {
                $tab_menu .='
                    <li class="nav-item">
                        <a class="nav-link active" href="#Menu'.$chitiet['id'].'" data-bs-toggle="tab" >'.$chitiet['Tenmonhoc'].' </a>
                    </li>';
                $tab_content .='<div id="Menu'.$chitiet['id'].'" class="container tab-pane active"><br>
                                    <table class="table table-bordered table-hover table-responsive" >
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sinh viên</th>
                                                <th>MSV</th>
                                                <th>Lớp</th>
                                                <th>Khoá</th>
                                            </tr>
                                        </thead>
                                    <tbody>';
            }
            else{
                $tab_menu .='
                    <li class="nav-item">
                        <a class="nav-link " href="#Menu'.$chitiet['id'].'" data-bs-toggle="tab" >'.$chitiet['Tenmonhoc'].'</a>
                    </li>';
                $tab_content .='<div id="Menu'.$chitiet['id'].'" class="tab-pane container fade"><br>
                                <table class="table table-bordered table-hover table-responsive" >
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Tên sinh viên</th>
                                                                <th>MSV</th>
                                                                <th>Lớp</th>
                                                                <th>Khoá</th>
                                                            </tr>
                                                        </thead>
                                                    <tbody>';                                

            }

            $qr='select * from Chitietkhoahoc,Monhoc,Ketquadangky where Chitietkhoahoc.id_Monhoc = Monhoc.id and Ketquadangky.id_Chitietkhoahoc=Chitietkhoahoc.id 
            and Chitietkhoahoc.id_Giangvien="'.$data['id'].'" and Monhoc.Tenmonhoc="'.$chitiet['Tenmonhoc'].'"'; 
            // echo($qr);

            $rs1=Result($qr);
            $List1 = executeResult($qr);
            // echo($List1);
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
                $tab_content .=
                            '<tr>
                                <td >'.($index++).'</td>
                                <td >'.$Tensinhvien.'</td>
                                <td >'.$MSV.'</td>
                                <td >'.$Tenlop.'</td>
                                <td >'.$Khoa.'</td>
                            </tr>';
            }
        }
        $count++;
        $tab_content .='  
                </tbody>
            </table>
        </div>';
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
                            <?php if($user['roles']=='Giảng viên'){?>
                                <a href="#" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    <span class=""><?php echo $data['Hovaten'] ?></span> 
                                    <span class="d-none d-md-inline mx-1">(<?php echo $data['MGV']?>)</span> 
                                    <span class="d-none d-md-inline mx-1">Role: <?php echo $user['roles'] ?></span> 
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
                        <?php if($user['roles']=='Giảng viên') { ?>
                            <ul class="navbar-nav nav-pills" id="menu">
                                <li class="nav-item">
                                    <a href="../index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Danhsachsinhvien.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Danh sách sinh viên">
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
                    <div class="panel-body">
                        <div class="container mt-3">
                        <!-- <br> -->
                        <div class="panel-heading">
                            <h2 class="text-center" style="color:#3289a8;font-family:Time New Roman;padding-top:15px;">DANH SÁCH SINH VIÊN</h2>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <?php echo $tab_menu; ?>
                        </ul>
                        <div class="tab-content">
                            <?php echo $tab_content;?> 
                        </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../Assets/Js/toggle.js" async defer></script>
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