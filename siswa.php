<?php
include "koneksi.php";
//kode simpan data
if (isset($_POST['simpan'])) {
    mysqli_query($con, "insert into tb_siswa values('','$_POST[nis]','$_POST[nama]','$_POST[jk]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[agama]','$_POST[kelas]','$_POST[jurusan]')");
    echo "<script>alert('Data Tersimpan')</script>";
    echo "<script>document.location.href='?siswa';</script>";
}

//kode hapus data
if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_siswa where kd_siswa='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
    echo "<script>document.location.href='?siswa';</script>";
}

// kode edit data
if (isset($_GET['edit'])) {
    $ed = mysqli_query($con, "select * from tb_siswa where kd_siswa='$_GET[id]'");
    $edit = mysqli_fetch_array($ed);
}

// kode update data
if (isset($_POST['update'])) {
    mysqli_query($con, "update tb_siswa set nis='$_POST[nis]',nama='$_POST[nama]', jk='$_POST[jk]', tgl_lahir='$_POST[tgl_lahir]', alamat='$_POST[alamat]', agama='$_POST[agama]', kelas='$_POST[kelas]',jurusan='$_POST[jurusan]' where kd_siswa='$_GET[id]'");
    echo "<script>alert('Data Terubah')</script>";
    echo "<script>document.location.href='?siswa';</script>";
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Input Data Siswa</div>
        <div class="card-body card-block">
            <form action="" method="post" class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nis</div>
                        <input type="number" id="username3" name="nis" value="<?= @$edit['nis'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama</div>
                        <input type="text" id="email3" name="nama" value="<?= @$edit['nama'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
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
                        <div class="input-group-addon"><i class="fa fa-male"></i><i class="fa fa-female"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Tanggal Lahir</div>
                        <input type="date" id="username3" name="tgl_lahir" value="<?= @$edit['tgl_lahir'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Alamat</div>
                        <textarea name="alamat" id="alamat" value="<?= @$edit['alamat'] ?>" cols="20" rows="10" class="form-control"><?= @$edit['alamat'] ?></textarea>
                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Agama</div>
                        <select id="agama" name="agama">
                            <option value="#">Pilih Agama</option>
                            <?php
                            $agama = array("Islam", "Kristen", "Hindu", "Buddha", "Kong Hucu");
                            foreach ($agama as $agama) { ?>
                                <option value="<?php echo $agama ?>" <?php if ($agama == @$edit['agama']) echo "selected='selected'" ?>>
                                    <?php echo $agama ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">kelas</div>
                        <select id="kelas" name="kelas">
                            <option value="#">Pilih Kelas</option>
                            <?php
                            $kelas = array("X", "XI", "XII");
                            foreach ($kelas as $kelas) { ?>
                                <option value="<?php echo $kelas ?>" <?php if ($kelas == @$edit['kelas']) echo "selected='selected'" ?>>
                                    <?php echo $kelas ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Jurusan</div>
                        <select id="jurusan" name="jurusan">
                            <option value="#">Pilih Jenis Jurusan</option>
                            <?php
                            $jurusan = array("RPL", "TKJ", "Askep", "Ankim", "Farmasi");
                            foreach ($jurusan as $jurusan) { ?>
                                <option value="<?php echo $jurusan ?>" <?php if ($jurusan == @$edit['jurusan']) echo "selected='selected'" ?>>
                                    <?php echo $jurusan ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-addon"><i class="fa fa-archive"></i></div>
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
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from tb_siswa order by nis asc");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jk'] ?></td>
                            <td><?= $data['tgl_lahir'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['agama'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['jurusan'] ?></td>
                            <td><a href="?siswa&edit&id=<?= $data['kd_siswa'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?siswa&hapus&id=<?= $data['kd_siswa'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?siswa&detail&id=<?= $data['kd_siswa'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>