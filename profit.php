<?php

require 'ceklogin.php';

//Hitung Jumlah Barang
$h1 = mysqli_query($c, "select * from profit");
$h2 = mysqli_num_rows($h1); //jumlah profit
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Toko ATK Serba Ada</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-plus text-secondary"></i></div>
                            Order
                        </a>
                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive text-info"></i></div>
                            Stock Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-poll text-light"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                            Kelola Pelanggan
                        </a>
                        <a class="nav-link" href="profit.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign text-success"></i></div>
                            Profit
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-power-off text-danger"></i></div>
                            Logout
                        </a>
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Profit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah Barang: <?= $h2; ?> </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Profit Barang
                    </button>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Profit
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Modal Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Keuntungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $get = mysqli_query($c, "select * from profit p,produk");
                                    $i = 1;

                                    while ($p = mysqli_fetch_array($get)) {
                                        $namaproduk = $p['namaproduk'];
                                        $deskripsi = $p['deskripsi'];
                                        $modalbeli = $p['modalbeli'];
                                        $hargajual = $p['hargajual'];
                                        $idproduk = $p['idproduk'];
                                        $keuntungan = $hargajual - $modalbeli;

                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $namaproduk; ?>: <?= $deskripsi; ?></td>
                                            <td>Rp<?= number_format($modal); ?></td>
                                            <td>Rp<?= number_format($hargajual); ?></td>
                                            <td>Rp<?= number_format($keuntungan); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idprofit; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idprofit; ?>">
                                                    Delete
                                                </button>


                                            </td>
                                        </tr>


                                        <!-- modal edit -->
                                        <div class="modal fade" id="edit<?= $idprofit; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">


                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah <?= $namaproduk; ?> </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>: <?= $deskripsi; ?>" disabled>
                                                            <input type="num" name="modalbeli" class="form-control mt-2" placeholder="Modal" value="<?= $modalbeli; ?>">
                                                            <input type="num" name="hargajual" class="form-control mt-2" placeholder="Harga Jual" value="<?= $hargajual; ?>">
                                                            <input type="hidden" name="idp" value="<?= $idproduk; ?>">
                                                            <input type="hidden" name="idpro" value="<?= $idproofit; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="editprofit">Submit</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- modal delete -->
                                        <div class="modal fade" id="delete<?= $idpro; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">


                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus <?= $namaproduk; ?> </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Profit Barang ini?
                                                            <input type="hidden" name="idp" value="<?= $idproduk; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="hapusbarang">Submit</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }; //end of while

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Muhammmad Helmina</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Profit Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post">

                <!-- Modal body -->
                <div class="modal-body">
                    pilih Profit
                    <select name="idproduk" class="from-control">

                    <?php
                    $getproduk =mysqli_query($c,"select * from produk");

                    while($pro=mysqli_fetch_array($getproduk)){
                        $namaproduk=$pro['namaproduk'];
                        $deskripsi=$pro['deskripsi'];
                        $modalbeli=$pro['modalbeli'];
                        $hargajual=$pro['hargajual'];
                        
                        
                        ?>

                        <option value="<?=$idproduk;?>"><?=$namaproduk;?>-<?=$deskripsi;?></option>

                        <?php

                    }
                    ?>
                    </select>

                    <input type="number" nama="modalbeli" class="form-control mt-4" placeholder="Modal">
                    <input type="number" nama="hargajual" class="form-control mt-4" placeholder="Harga">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahprofit">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>


</html>