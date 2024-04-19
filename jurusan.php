<?php
include "koneksi.php";
//kode simpan data
if (isset($_POST['simpan'])) {
    mysqli_query($con, "insert into tb_jurusan values('','$_POST[jurusan]','$_POST[nama_jurusan]','$_POST[kaprodi]')");
    echo "<script>alert('Data Tersimpan')</script>";
    echo "<script>document.location.href='?jurusan';</script>";
}

//kode hapus data
if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_jurusan where kd_jurusan='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
    echo "<script>document.location.href='?jurusan';</script>";
}

// kode edit data
if (isset($_GET['edit'])) {
    $ed = mysqli_query($con, "select * from tb_jurusan where kd_jurusan='$_GET[id]'");
    $edit = mysqli_fetch_array($ed);
}

// kode update data
if (isset($_POST['update'])) {
    mysqli_query($con, "update tb_jurusan set jurusan='$_POST[jurusan]', nama_jurusan='$_POST[nama_jurusan]', kaprodi='$_POST[kaprodi]' where kd_jurusan='$_GET[id]'");
    echo "<script>alert('Data Terubah')</script>";
    echo "<script>document.location.href='?jurusan';</script>";
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Input Jurusan</div>
        <div class="card-body card-block">
            <form action="" method="post" class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Jurusan</div>
                        <input type="text" id="jurusan" name="jurusan" value="<?= @$edit['jurusan'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama Jurusan</div>
                        <input type="text" id="username3" name="nama_jurusan" value="<?= @$edit['nama_jurusan'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Kaprodi</div>
                        <input type="text" id="username3" name="kaprodi" value="<?= @$edit['kaprodi'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <?php
                    if (isset($_GET['edit'])) { ?>
                        <input type="submit" name="update" value="update" class="btn btn-success">
                    <?php } else { ?>
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>



<div class=" col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Jurusan</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Kaprodi</th>
                        <th>Action</th>
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
                            <td><a href="?jurusan&edit&id=<?= $data['kd_jurusan'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?jurusan&hapus&id=<?= $data['kd_jurusan'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?jurusan&detail&id=<?= $data['kd_jurusan'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>