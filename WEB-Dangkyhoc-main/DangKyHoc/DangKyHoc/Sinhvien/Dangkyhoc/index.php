<?php 
    include('../../Db/dbhelper.php');
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);

    if(isset($user['username'])){
        if($user['roles']=='Sinh viên')
        {
            $sql = 'SELECT * FROM Account INNER JOIN Sinhvien ON Sinhvien.id_acc='.$user['id'];
        
            $query = mysqli_query($con,$sql);
            $data  = mysqli_fetch_array($query);
            $_SESSION['data']= $data;
        }
    }
    $GetToday = date('Y-m-d H:s:i');
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Đăng Ký Học</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                            <?php if($user['roles']=='Sinh viên'){?>
                                <a href="#" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    <span class=""><?php echo $data['Hovaten'] ?></span> 
                                    <span class="d-none d-md-inline mx-1">(<?php echo $data['MSV']?>)</span> 
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
                        <?php if($user['roles']=='Sinh viên'){?>
                            <ul class="navbar-nav nav-pills" id="menu">
                                <li class="nav-item">
                                    <a href="../index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Đăng ký học">
                                        <i class="fs-4 bi-grid"></i> <span class="ms-1 ">Đăng ký học</span> </a>
                                    <ul class="collapse  nav flex-column" id="submenu1" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="#" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Đăng ký học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Đăng ký học </span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link px-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Kết quả đăng ký học"><i class="bi bi-card-checklist icon-nav" style="padding-right:10px"></i><span class="ms-1">Kết quả đăng ký học</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Tra cứu học phí">
                                        <i class="fs-4 bi-table"></i> <span class="ms-1">Tra cứu học phí</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Chương trình đào tạo">
                                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 ">Chương trình đào tạo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Thông tin sinh viên">
                                        <i class="fs-4 bi-people"></i> <span class="ms-1">Thông tin sinh viên</span> 
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container" style="padding-top:50px;">
                        <div class="panel panel-primary" style="overflow-x:auto;">
                            <div class="panel-heading">
                            <?php
                                    $data = (isset($_SESSION['data'])? $data = $_SESSION['data']:[]);
                                    $id_user = $data['id'];
                                    $sql='select * from Sinhvien,Lop,Khoa where Sinhvien.id_lop=Lop.id and Lop.id_khoa=Khoa.id and Sinhvien.id='.$id_user;
                                    $row1 = executeSingleResult($sql);
                                    if ($row1 != null) {
                                        $MSV         = $row1['MSV'];
                                        $Tensinhvien = $row1['Hovaten'];
                                        $Doituong    = $row1['Doituong'];
                                        $Khoa        = $row1['tenkhoa'];
                                        echo'<h4 class="text-center" style="padding-bottom:10px;font-family:Time New Roman;color:#d40b2c">
                                        '.$MSV.' - '.$Tensinhvien.' - Khoa '.$Khoa.' - '.$Doituong.'';
                                    }
                                    echo'<h2 class="text-center" style="color:#3289a8;font-family:Time New Roman">DANH SÁCH LỚP HỌC PHẦN CÓ THỂ ĐĂNG KÝ</h2>';
                                    
                                    $query='select * from Sinhvien,Khoahoc,Chitietkhoahoc where 
                                    Khoahoc.MKH=Chitietkhoahoc.MKH and Sinhvien.id="'.$id_user.'" and Khoahoc.NgayDangKy <="'.$GetToday.'" and Khoahoc.HanDangKy >="'.$GetToday.'"';
                                    $row = executeSingleResult($query);
                                    if ($row != null) {
                                        $NgayDangKy = $row['NgayDangKy'];
                                        $HanDangKy  = $row['HanDangKy'];
                                        echo'<h4 class="text-center" style="padding-bottom:25px;font-family:Time New Roman;color:black">
                                        Hạn đăng ký: '.$NgayDangKy.' --> '.$HanDangKy.'</h4>';
                                    }
                                    else{
                                        echo'<h4 class="text-center" style="padding-bottom:25px;font-family:Time New Roman;color:black">
                                        Bạn chưa được phân công khoá học nào !</h4>';
                                    }
                                   

                                    // $tongtc = (isset($_SESSION['Tinchi'])? $tongtc = $_SESSION['Tinchi']:[]);
                                    // echo'<h5 class="text-end" style="font-family:Time New Roman";padding-bottom:20px;>Bạn đã đăng ký: '.$tongtc.' TC</h5>'; 
                                ?>
                                <!-- <?php echo(date('Y-m-d H:s:i')); ?> -->
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form method="get" style="padding-bottom:10px">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Seaching..." id="s" name="s" onkeyup="search(this.value)">
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered table-hover table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Môn học</th>
                                            <th>Giảng viên</th>
                                            <th>Lớp</th>
                                            <th>Học kỳ</th>
                                            <th>Năm học</th>
                                            <th>Sỹ số</th>
                                            <th>Thời gian</th>
                                            <th>Địa điểm</th>
                                            <th>Số TC</th>
                                            <th>Học phí</th>
                                            <th width="40px"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablesearch">
                                        <?php 
                                            $data = (isset($_SESSION['data'])? $data = $_SESSION['data']:[]);
                                            $id_user = $data['id'];

                                            $s='';
                                            if(isset($_GET['s']))
                                            {
                                                $s = $_GET['s'];
                                            }
                                            $newsql='';
                                            if(!empty($s))
                                            {
                                                $searchId='select id from Monhoc where Tenmonhoc="'.$s.'"';
                                                // echo($searchId);
                                                $Infor = executeSingleResult($searchId);
                                                if($Infor!=null)
                                                {
                                                    $newsql='and Chitietkhoahoc.id_Monhoc like "%'.$Infor['id'].'%"';
                                                    // echo($newsql);
                                                }
                                            }

                                            $sql1='select * from Khoahoc,Chitietkhoahoc where 
                                            Khoahoc.MKH=Chitietkhoahoc.MKH '.$newsql.' and Khoahoc.NgayDangKy <="'.$GetToday.'" and Khoahoc.HanDangKy >="'.$GetToday.'"';
                                            // echo($sql1);
                                            $monhocList = executeResult($sql1);
                                            $index=1;
                                            foreach($monhocList as $item){
                                                $sql='select * from Monhoc where id='.$item['id_Monhoc'];
                                                $chitiet = executeSingleResult($sql);
                                                if ($chitiet != null) {
                                                    $Tenmonhoc          = $chitiet['Tenmonhoc'];
                                                    $Sotinchi           = $chitiet['Sotinchi'];
                                                    $Hocphi             = $chitiet['Hocphi'];
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
                                                        <td >'.$Tenmonhoc.'</td>
                                                        <td >'.$Hovaten .'</td>
                                                        <td >'.$Tenlop.'</td>
                                                        <td >'.$Tenhocky.'</td>
                                                        <td >'.$Tennamhoc.'</td>
                                                        <td >'.$item['Syso'].'</td>
                                                        <td >Từ '.$item['NgayBatDau'].' đến '.$item['NgayKetThuc'].'</td>
                                                        <td >'.$item['Diadiem'].'</td>
                                                        <td >'.$Sotinchi.'</td>
                                                        <td >'.$Hocphi.'</td>';
                                                    echo'
                                                        <td>';
                                                        $id_ctkh= $item['id'];
                                                        // echo($id_ctkh);
                                                        $query1='select * from Chitietkhoahoc,Ketquadangky where 
                                                        Ketquadangky.id_sv ="'.$id_user.'" and Ketquadangky.id_Chitietkhoahoc="'.$id_ctkh.'"';
                                                        $rs = executeSingleResult($query1);
                                                        if ($rs != null) {
                                                            echo'<button class="btn btn-warning">Đã Đăng Ký</button>';
                                                        }
                                                        else{
                                                            echo'<button class="btn btn-success" onclick="Dangky('.$item['id'].')">Đăng Ký</button>';
                                                        }
                                                        echo'</td>
                                                    </tr>';
                                            }
                                            // echo($item['id']);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="split>" style="height:3px;background:#2807a3;margin-top:20px;"></div>
                    <div class="container" style="padding-top:50px;">
                        <div class="panel panel-primary" style="overflow-x:auto;">
                            <div class="panel-heading">
                                <h2 class="text-center" style="color:#3289a8;font-family:Time New Roman">DANH SÁCH LỚP HỌC PHẦN ĐÃ ĐĂNG KÝ</h2>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Môn học</th>
                                            <th>Giảng viên</th>
                                            <th>Lớp</th>
                                            <th>Học kỳ</th>
                                            <th>Năm học</th>
                                            <th>Sỹ số</th>
                                            <th>Thời gian</th>
                                            <th>Địa điểm</th>
                                            <th>Số TC</th>
                                            <th>Học phí</th>
                                            <th width="40px"></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php 

                                            $tonghocphi=$tongtinchi=0;
                                            $sql1='select * from Khoahoc,Chitietkhoahoc,Ketquadangky where 
                                            Khoahoc.MKH=Chitietkhoahoc.MKH and Chitietkhoahoc.id=Ketquadangky.id_Chitietkhoahoc and Ketquadangky.id_sv ="'.$id_user.'"
                                            and Chitietkhoahoc.NgayKetThuc > "'.$GetToday.'"';
                                            // echo($sql1);
                                            $monhocList = executeResult($sql1);
                                            $index=1;
                                            foreach($monhocList as $item){
                                                $sql='select * from Monhoc where id='.$item['id_Monhoc'];
                                                $chitiet = executeSingleResult($sql);
                                                if ($chitiet != null) {
                                                    $Tenmonhoc          = $chitiet['Tenmonhoc'];
                                                    $Sotinchi           = $chitiet['Sotinchi'];
                                                    $Hocphi             = $chitiet['Hocphi'];
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

                                                $tonghocphi +=$Hocphi;
                                                $tongtinchi +=$Sotinchi;

                                                echo'<tr>
                                                        <td >'.($index++).'</td>
                                                        <td >'.$Tenmonhoc.'</td>
                                                        <td >'.$Hovaten .'</td>
                                                        <td >'.$Tenlop.'</td>
                                                        <td >'.$Tenhocky.'</td>
                                                        <td >'.$Tennamhoc.'</td>
                                                        <td >'.$item['Syso'].'</td>
                                                        <td >Từ '.$item['NgayBatDau'].' đến '.$item['NgayKetThuc'].'</td>
                                                        <td >'.$item['Diadiem'].'</td>
                                                        <td >'.$Sotinchi.'</td>
                                                        <td >'.$Hocphi.'</td>';
                                                        
                                                    
                                                if($item['NgayDangKy'] <= date('Y-m-d H:s:i') && $item['HanDangKy'] >= date('Y-m-d H:s:i'))
                                                {
                                                    echo'<td> <button class="btn btn-danger" onclick="Huydangky('.$item['id_dk'].')">Huỷ</button></td>';
                                                }
                                                else{
                                                    echo'<td></td></tr>';
                                                }
                                            }
                                            // <td>
                                            // <button class="btn btn-danger" onclick="Huydangky('.$item['id_dk'].')">Huỷ</button>
                                                            
                                            // </td>
                                            echo'<tr>
                                                <td></td>
                                                <td>Tổng</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>'.$tongtinchi.'</td>
                                                <td>'.$tonghocphi.'</td>
                                                <td></td>
                                            </tr>';
                                            echo'<h5 class="text-end" style="font-family:Time New Roman";padding-bottom:20px;>Bạn đã đăng ký: '.$tongtinchi.' TC</h5>';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../Assets/Js/toggle.js" async defer></script>
        <script type="text/javascript">
            function Dangky(id){
                // console.log(id);
                var option=confirm("Đăng ký thành công ! Xem kết quả bên dưới")
                $.post('ajax.php',
                {
                    'id': id,
                    'action': 'add'
                },function(data)
                {
                    location.reload()
                })
            }
            function Huydangky(id){
                console.log(id);
                var option=confirm("Bạn có chắc huỷ học phần này không ?")
                if(!option)
                {
                    return;
                }
                $.post('ajax.php',
                {
                    'id': id,
                    'action': 'delete'
                },function(data)
                {
                    location.reload()
                })
            }
            // function search(value)
            // {
            //     $.post('ajax.php',
            //     {
            //         'value': value,
            //         'action': 'search'
            //     },function(data)
            //     {
            //         $('#tablesearch').html(data);
                    
            //     })
            // }
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