<?php
include "koneksi.php";
//kode simpan data
if (isset($_POST['simpan'])) {
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $tipe_file   = $_FILES['gambar']['type'];
    $nama_file   = $_FILES['gambar']['name'];
    $direktori   = "gambar/$nama_file";
    move_uploaded_file($lokasi_file, $direktori);
    mysqli_query($con, "insert into tb_guru values('','$_POST[nama_guru]','$_POST[jk]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[no_hp]','$_POST[mapel]','$direktori')");
    echo "<script>alert('Data Tersimpan')</script>";
    echo "<script>document.location.href='?guru';</script>";
}

//kode hapus data
if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_guru where kd_guru='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
    echo "<script>document.location.href='?guru';</script>";
}

// kode edit data
if (isset($_GET['edit'])) {
    $ed = mysqli_query($con, "select * from tb_guru where kd_guru='$_GET[id]'");
    $edit = mysqli_fetch_array($ed);
}

// kode update data
if (isset($_POST['update'])) {
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $tipe_file   = $_FILES['gambar']['type'];
    $nama_file   = $_FILES['gambar']['name'];
    $direktori   = "gambar/$nama_file";
    move_uploaded_file($lokasi_file, $direktori);
    mysqli_query($con, "update tb_guru set nama='$_POST[nama_guru]', jk='$_POST[jk]', tgl_lahir='$_POST[tgl_lahir]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]', mapel='$_POST[mapel]',gambar='$direktori' where kd_guru='$_GET[id]'");
    echo "<script>alert('Data Terubah')</script>";
    echo "<script>document.location.href='?guru';</script>";
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Input Data Guru</div>
        <div class="card-body card-block">
            <form action="" method="post" class="" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama Guru</div>
                        <input type="text" id="username3" name="nama_guru" value="<?= @$edit['nama_guru'] ?>" class="form-control">
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
                        <div class="input-group-addon"><i class="fa fa-male"></i><i class="fa fa-female"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Tanggal Lahir</div>
                        <input type="date" id="password3" name="tgl_lahir" value="<?= @$edit['tgl_lahir'] ?>" class="form-control">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Alamat</div>
                        <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="5"><?= @$edit['alamat'] ?></textarea>
                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
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
                        <div class="input-group-addon">Mapel</div>
                        <select id="mapel" name="mapel" class="form-control">
                            <option value="#">Pilih Mata Pelajaran</option>
                            <?php
                            $mapel = array("Pendidikan Agama Islam", "Teknologi Informasi dan Komunikasi", "Pendidikan Jasmani dan Olahraga", "Seni Budaya", "Bahasa Indonesia", "Produktif", "Pendidiakan Kewarganegaraan", "Bahasa Indonesia", "Matematika", "Bahasa Sunda");
                            foreach ($mapel as $mapel) { ?>
                                <option value="<?php echo $mapel ?>" <?php if ($mapel == @$edit['mapel']) echo "selected='selected'" ?>>
                                    <?php echo $mapel ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-addon"><i class="fa fa-folder"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">gambar</div>
                        <input type="file" name="gambar" id="gambar" value="<?= @$edit['gambar'] ?>" class="form-control" <?= "selected='selected'" ?>>
                        <div class="input-group-addon"><i class="fa fa-camera-retro"></i></div>
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
            <strong class="card-title">Data Guru</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Mapel</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from tb_guru order by nama_guru asc");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['nama_guru'] ?></td>
                            <td><?= $data['jk'] ?></td>
                            <td><?= $data['tgl_lahir'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td><?= $data['mapel'] ?></td>
                            <td><img src="<?= $data['gambar'] ?>" width="200px"></td>
                            <td>
                                <a href="?guru&edit&id=<?= $data['kd_guru'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?guru&hapus&id=<?= $data['kd_guru'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?guru&detail&id=<?= $data['kd_guru'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>