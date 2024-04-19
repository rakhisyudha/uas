<?php
include "koneksi.php";
//kode simpan data
if (isset($_POST['simpan'])) {
    mysqli_query($con, "insert into tb_user values('','$_POST[nama]','$_POST[jk]','$_POST[no_hp]','$_POST[username]','$_POST[password]','$_POST[jabatan]')");
    echo "<script>alert('Data Tersimpan')</script>";
    echo "<script>document.location.href='?user';</script>";
}

//kode hapus data
if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_user where kd_user='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
    echo "<script>document.location.href='?user';</script>";
}

// kode edit data
if (isset($_GET['edit'])) {
    $ed = mysqli_query($con, "select * from tb_user where kd_user='$_GET[id]'");
    $edit = mysqli_fetch_array($ed);
}

// kode update data
if (isset($_POST['update'])) {
    mysqli_query($con, "update tb_user set nama='$_POST[nama]', jk='$_POST[jk]', no_hp='$_POST[no_hp]', username='$_POST[username]', password='$_POST[password]', jabatan='$_POST[jabatan]' where kd_user='$_GET[id]'");
    echo "<script>alert('Data Terubah')</script>";
    echo "<script>document.location.href='?user';</script>";
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Input Data User</div>
        <div class="card-body card-block">
            <form action="" method="post" class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama</div>
                        <input type="text" id="username3" name="nama" value="<?= @$edit['nama'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Jenis Kelamin</div>
                        <select id="jk" name="jk" class="form-control">
                            <option value="#">Pilih Jenis Kelamin</option>
                            <?php
                            $jk = array("Laki-Laki", "Perempuan");
                            foreach ($jk as $jk) { ?>
                                <option value="<?php echo $jk ?>" <?php if ($jk == @$edit['jk']) echo "selected='selected'" ?>>
                                    <?php echo $jk ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">No Hp</div>
                        <input type="number" id="password3" name="no_hp" value="<?= @$edit['no_hp'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Username</div>
                        <input type="text" id="username3" name="username" value="<?= @$edit['username'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Password</div>
                        <input type="password" id="password3" name="password" value="<?= @$edit['password'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Jabatan</div>
                        <input type="text" id="username3" name="jabatan" value="<?= @$edit['jabatan'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
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





<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data User</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from tb_user order by nama asc");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jk'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['jabatan'] ?></td>
                            <td><a href="?user&edit&id=<?= $data['kd_user'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?user&hapus&id=<?= $data['kd_user'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?user&detail&id=<?= $data['kd_user'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>