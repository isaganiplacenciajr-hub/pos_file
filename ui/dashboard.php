<?php


include_once'connectdb.php';
session_start();


if($_SESSION['useremail']==""){

header('location:../index.php');

}






include_once"header.php";


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div class="alert alert-primary text-center" style="font-size:1.3rem; font-weight:500;">Welcome back, Admin!</div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-12 mb-4">
            <div class="card shadow border-0" style="background: linear-gradient(135deg, #17a2b8 60%, #138496 100%); color: #fff;">
              <div class="card-body d-flex align-items-center">
                <div class="mr-3" style="font-size:2.5rem;"><i class="fas fa-box"></i></div>
                <div>
                  <div style="font-size:1.1rem; font-weight:500;">Total Products</div>
                  <div style="font-size:2rem; font-weight:bold;">
                    <?php
                    $stmt = $pdo->prepare('SELECT COUNT(*) as total_products FROM tbl_product');
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['total_products'] ?? 0;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12 mb-4">
            <div class="card shadow border-0" style="background: linear-gradient(135deg, #28a745 60%, #218838 100%); color: #fff;">
              <div class="card-body d-flex align-items-center">
                <div class="mr-3" style="font-size:2.5rem;"><i class="fas fa-file-invoice"></i></div>
                <div>
                  <div style="font-size:1.1rem; font-weight:500;">Total Orders</div>
                  <div style="font-size:2rem; font-weight:bold;">
                    <?php
                    $stmt = $pdo->prepare('SELECT COUNT(*) as total_orders FROM tbl_invoice');
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row['total_orders'] ?? 0;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12 mb-4">
            <div class="card shadow border-0" style="background: linear-gradient(135deg, #ffc107 60%, #e0a800 100%); color: #fff;">
              <div class="card-body d-flex align-items-center">
                <div class="mr-3" style="font-size:2.5rem;"><i class="fas fa-coins"></i></div>
                <div>
                  <div style="font-size:1.1rem; font-weight:500;">Total Sales</div>
                  <div style="font-size:2rem; font-weight:bold;">
                    <?php
                    $stmt = $pdo->prepare('SELECT SUM(total) as total_sales FROM tbl_invoice');
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo number_format($row['total_sales'] ?? 0, 2);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 
 <?php

include_once"footer.php";


?>