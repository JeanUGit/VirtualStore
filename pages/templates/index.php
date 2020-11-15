<?php
  session_start();
  $name = '';
  if( $_SESSION['login_id'] == null || $_SESSION['login_id'] == ""){
    echo '¡Sin Autorización!';
    die();
  }
  else{  
    if(isset($_POST['close'])){
      session_destroy();
      header('location:../../login.php');
    }else{
      $name =  $_SESSION['usuario_name'];
      // $foto =  $_SESSION['usuario_photo'];
    }
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Resumen</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/estilosConfugracion.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/estilosRecover.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <?php include('../../partials/_navbar.php')?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include('../../partials/_sidebar.php')?>
            <!-- partial -->
            <!-- main-panel ends -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div id="MainContainer">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Smart Watch Iphone 12 </h4>
                                    <p class="card-description"> 11-09-2020
                                    </p>
                                    <img src="./Store Virtual/assets/images/faces/face1.jpg" alt="">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> User </th>
                                                <th> First name </th>
                                                <th> Progress </th>
                                                <th> Amount </th>
                                                <th> Deadline </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-1.png"
                                                        alt="image" />
                                                </td>
                                                <td> Herman Beck </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $ 77.99 </td>
                                                <td> May 15, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-2.png"
                                                        alt="image" />
                                                </td>
                                                <td> Messsy Adam </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $245.30 </td>
                                                <td> July 1, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-3.png"
                                                        alt="image" />
                                                </td>
                                                <td> John Richards </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $138.00 </td>
                                                <td> Apr 12, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-4.png"
                                                        alt="image" />
                                                </td>
                                                <td> Peter Meggik </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $ 77.99 </td>
                                                <td> May 15, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-1.png"
                                                        alt="image" />
                                                </td>
                                                <td> Edward </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $ 160.25 </td>
                                                <td> May 03, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-2.png"
                                                        alt="image" />
                                                </td>
                                                <td> John Doe </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $ 123.21 </td>
                                                <td> April 05, 2015 </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../assets/images/faces-clipart/pic-3.png"
                                                        alt="image" />
                                                </td>
                                                <td> Henry Tom </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td> $ 150.00 </td>
                                                <td> June 16, 2015 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include '../../partials/_footer.php' ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!--routes-->
    <script src="../../assets/js/routes.js"></script>
    <!--End routes-->
    <!--Chart-->
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/configuracion.js"></script>
    <script src="../../assets/js/chat-popup.js"></script>
    <!--End chart-->
</body>

</html>