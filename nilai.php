<?php
include "koneksi.php";
//kode simpan data
if (isset($_POST['submit'])) {
    mysqli_query($con, "insert into tb_nilai values('','$_POST[nis]','$_POST[nama]','$_POST[kelas]','$_POST[jurusan]','$_POST[pai]','$_POST[pkn]','$_POST[bindo]','$_POST[binggris]','$_POST[senbud]','$_POST[penjas]','$_POST[pkwu]','$_POST[mtk]','$_POST[total]','$_POST[rata]','$_POST[pred]','$_POST[stat]')");
    echo "<script>alert('Data Tersimpan')</script>";
    echo "<script>document.location.href='?nilai';</script>";
}

//kode hapus data
if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_nilai where kd_nilai='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
    echo "<script>document.location.href='?nilai';</script>";
}

// kode edit data
if (isset($_GET['edit'])) {
    $ed = mysqli_query($con, "select * from tb_nilai where kd_nilai='$_GET[id]'");
    $edit = mysqli_fetch_array($ed);
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Input Data Nilai</div>
        <div class="card-body card-block">
            <form action="" method="post" class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nis</div>
                        <input type="number" id="nis" name="nis" class="form-control" onchange="submit()" value="<?= @$_POST['nis'] ?>">
                        <?php
                        if (isset($_POST['nis'])) {
                            $n = mysqli_query($con, "select * from tb_siswa where nis='$_POST[nis]'");
                            $nis = mysqli_fetch_array($n);
                        }
                        ?>
                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama</div>
                        <input type="text" id="name" name="nama" class="form-control-read-only" value="<?= @$nis['nama'] ?>">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Kelas</div>
                        <input type="text" id="kelas" name="kelas" class="form-control-read-only" value="<?= @$nis['kelas'] ?>">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Jurusan</div>
                        <input type="text" id="jurusan" name="jurusan" class="form-control-read-only" value="<?= @$nis['jurusan'] ?>">
                        <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Pai</div>
                        <input type="number" id="pai" name="pai" class="form-control" value="<?= @$_POST['pai'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">pkn</div>
                        <input type="number" id="pkn" name="pkn" class="form-control" value="<?= @$_POST['pkn'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">bindo</div>
                        <input type="number" id="bindo" name="bindo" class="form-control" value="<?= @$_POST['bindo'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">binggris</div>
                        <input type="number" id="binggris" name="binggris" class="form-control" value="<?= @$_POST['binggris'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">senbud</div>
                        <input type="number" id="senbud" name="senbud" class="form-control" value="<?= @$_POST['senbud'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">penjas</div>
                        <input type="number" id="penjas" name="penjas" class="form-control" value="<?= @$_POST['penjas'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">pkwu</div>
                        <input type="number" id="pkwu" name="pkwu" class="form-control" value="<?= @$_POST['pkwu'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">mtk</div>
                        <input type="number" id="mtk" name="mtk" class="form-control" value="<?= @$_POST['mtk'] ?>" require>
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>

                <div class="form-actions form-group">
                    <input type="submit" name="hitung" value="hitung" class="btn btn-warning btn-sm" name="submit">
                    <?php
                    if (isset($_POST['hitung'])) {
                        @$total = $_POST['pai'] + $_POST['pkn'] + $_POST['bindo'] + $_POST['binggris'] + $_POST['senbud'] + $_POST['penjas'] + $_POST['pkwu'] + $_POST['mtk'];
                    }
                    @$rata = @$total / 8;
                    if ($rata >= 90) {
                        $pred = "A";
                    } elseif ($rata >= 80) {
                        $pred = "B";
                    } elseif ($rata >= 70) {
                        $pred = "C";
                    } elseif ($rata >= 60) {
                        $pred = "D";
                    } else {
                        $pred = "E";
                    }
                    if ($rata >= 75) {
                        $stat = "Lulus";
                    } else {
                        $stat = "Tidak Lulus";
                    }

                    ?>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">total</div>
                        <input type="number" id="pkwu" name="total" value="<?= @$total ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">rata-rata</div>
                        <input type="number" id="mtk" name="rata" value="<?= @$rata ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">predikat</div>
                        <input type="text" id="pred" name="pred" value="<?= @$pred ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <div class="input-group-addon">Status</div>
                        <input type="text" id="stat" name="stat" value="<?= @$stat ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <input type="submit" name="submit" value="simpan" class="btn btn-primary btn-sm">
                </div>


            </form>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Nilai</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Total</th>
                        <th>Rata</th>
                        <th>Pred</th>
                        <th>Stat</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from tb_nilai order by nis asc");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>

                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['jurusan'] ?></td>
                            <td><?= $data['total'] ?></td>
                            <td><?= $data['rata'] ?></td>
                            <td><?= $data['pred'] ?></td>
                            <td><?= $data['stat'] ?></td>
                            <td>
                                <a href="?nilai&hapus&id=<?= $data['kd_nilai'] ?>" class="btn btn-danger">Hapus</a>
                                <div class="print-content">
                                    <a href="cetak.php?cetak&id=<?= $data['kd_nilai'] ?>" class="btn btn-primary">Cetak</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="cetak">
                <center>
                    <input type="submit" value="Cetak Semua" onclick="" class="btn btn-warning">
                </center>
            </div>
        </div>
    </div>
</div>