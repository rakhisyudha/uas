<?php
include "koneksi.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <?php
                $sis = mysqli_query($con, "select count(*) as total_siswa from tb_siswa");
                $wa = mysqli_fetch_array($sis);
                ?>
                <h4 class="mb-0">
                    <span class="count"><?= $wa['total_siswa']; ?></span>
                </h4>
                <p class="text-light">Jumlah Siswa</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <?php
                $kin = mysqli_query($con, "select count(*) as total_guru from tb_guru");
                $nan = mysqli_fetch_array($kin);
                ?>
                <h4 class="mb-0">
                    <span class="count"><?= $nan['total_guru']; ?></span>
                </h4>
                <p class="text-light">Jumlah Guru</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <?php
                $fa = mysqli_query($con, "select count(*) as total_lulus from tb_nilai where stat='lulus'");
                $rih = mysqli_fetch_array($fa);
                ?>
                <h4 class="mb-0">
                    <span class="count"><?= $rih['total_lulus']; ?></span>
                </h4>
                <p class="text-light">Jumlah Siswa Lulus</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <?php
                $re = mysqli_query($con, "select count(*) as total_jurusan from tb_jurusan");
                $za = mysqli_fetch_array($re);
                ?>
                <h4 class="mb-0">
                    <span class="count"><?= $za['total_jurusan'] ?></span>
                </h4>
                <p class="text-light">Total Jurusan</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-6">
        <div class="social-box facebook">
            <i class="fa fa-facebook"></i>
            <ul>
                <li>
                    <span class="count">40</span> k
                    <span>friends</span>
                </li>
                <li>
                    <span class="count">450</span>
                    <span>feeds</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box twitter">
            <i class="fa fa-twitter"></i>
            <ul>
                <li>
                    <span class="count">30</span> k
                    <span>friends</span>
                </li>
                <li>
                    <span class="count">450</span>
                    <span>tweets</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box linkedin">
            <i class="fa fa-linkedin"></i>
            <ul>
                <li>
                    <span class="count">40</span> +
                    <span>contacts</span>
                </li>
                <li>
                    <span class="count">250</span>
                    <span>feeds</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box google-plus">
            <i class="fa fa-google-plus"></i>
            <ul>
                <li>
                    <span class="count">94</span> k
                    <span>followers</span>
                </li>
                <li>
                    <span class="count">92</span>
                    <span>circles</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title mb-0">Table Jurusan</h4>
                    </div>
                </div>
                <!--/.row-->
                <div class="chart-wrapper mt-4">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jurusan</th>
                                <th>Nama Jurusan</th>
                                <th>Kaprodi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "select * from tb_jurusan order by jurusan asc");
                            $no = 0;
                            while ($data = mysqli_fetch_array($sql)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td><?= $data['nama_jurusan'] ?></td>
                                    <td><?= $data['kaprodi'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <section class="card">
            <div class="twt-feed blue-bg">
                <div class="corner-ribon black-ribon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="fa fa-twitter wtt-mark"></div>

                <div class="media">
                    <a href="#">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="logo/childee.png">
                    </a>
                    <div class="media-body">
                        <h2 class="text-white display-6">Rakhis</h2>
                        <p class="text-light">Project Manager</p>
                    </div>
                </div>
            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h5>750</h5>
                        Tweets
                    </li>
                    <li>
                        <h5>865</h5>
                        Following
                    </li>
                    <li>
                        <h5>3645</h5>
                        Followers
                    </li>
                </ul>
            </div>
            <div class="twt-write col-sm-12">
                <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
            </div>
            <footer class="twt-footer">
                <a href="#"><i class="fa fa-camera"></i></a>
                <a href="#"><i class="fa fa-map-marker"></i></a>
                New Castle, UK
                <span class="pull-right">
                    32
                </span>
            </footer>
        </section>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-check text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <?php
                        $fa = mysqli_query($con, "select count(*) as total_lulus from tb_nilai where stat='lulus'");
                        $rih = mysqli_fetch_array($fa);
                        ?>
                        <div class="stat-text">Siswa Lulus</div>
                        <div class="stat-digit"><?= $rih['total_lulus'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-close text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <?php
                        $ra = mysqli_query($con, "select count(*) as tidak_lulus from tb_nilai where stat='tidak lulus'");
                        $khis = mysqli_fetch_array($ra);
                        ?>
                        <div class="stat-text">Siswa Tidak Lulus</div>
                        <div class="stat-digit"><?= $khis['tidak_lulus'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <?php
                        $az = mysqli_query($con, "select count(*) as total_siswa from tb_siswa");
                        $zam = mysqli_fetch_array($az);
                        ?>
                        <div class="stat-text">Total Siswa</div>
                        <div class="stat-digit"><?= $zam['total_siswa'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>World</h4>
            </div>
            <div class="Vector-map-js">
                <div id="vmap" class="vmap" style="height: 265px;"></div>
            </div>
        </div>
        <!-- /# card -->
    </div>