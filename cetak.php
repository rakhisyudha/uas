<?php
include "koneksi.php";
?>
<img src="logo/farmako.png" align="left" width="100px">
<img src="logo/kabbogor.png" align="right" width="94px%">
<center>
    <h2>
        <p style="line-height: 40%;">YAYASAN AL MUCHTARI CIMANDE</p>
    </h2>
    <h2>
        <p style="line-height: 40%;">SMK FARMAKO MEDIKA PLUS</p>
    </h2>
    <h4>
        <p style="line-height: 40%;">Jl. Raya Sukabumi KM. 15 HE Sukma Talang 2 Cimande</p>
    </h4>
    <h4>
        <p style="line-height: 40%;">Desa Lemah Duhur Kecamatan Caringin Kab. Bogor</p>
    </h4>
    <h4>
        <p style="line-height: 40%;">Telepon : 081584721613</p>
    </h4>
    <h4>
        <p style="line-height: 40%;">Email : <u>smkfarmakomedika@yahoo.co.id. http://almuchtari.sch.id</u></p>
    </h4>
</center>
<?php
if (isset($_GET['cetak'])) {


    $sql = mysqli_query($con, "select * from tb_nilai where kd_nilai='$_GET[id]'");
    $data = mysqli_fetch_array($sql);
}
?>
<hr width="100%">
<div class="container">
    <center>
        <h2>Laporan Hasil Ujian Sekolah</h2>
    </center>
    <p style="line-height: 40%;"><strong> NIS : <?= @$data['nis'] ?></strong></p>
    <p style="line-height: 40%;"><strong> Nama : <?= @$data['nama'] ?></strong></p>
    <p style="line-height: 40%;"><strong> Kelas : <?= @$data['kelas'] ?></strong></p>
    <p style="line-height: 40%;"><strong> Jurusan : <?= @$data['jurusan'] ?></strong></p>
</div>



<table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
        <td><strong>Nama Mata Pelajaran</strong></td>
        <td><strong>Nilai</strong></td>
        <td><strong>Keterangan</strong></td>
    </tr>
    <tr>
        <td><label>Pendidikan Agama Islam</label></td>
        <td><?= @$data['pai'] ?></td>
        <?php
        if ($data['pai'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['pai'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['pai'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Pendidikan Kewarganegaraan</label></td>
        <td><?= @$data['pkn'] ?></td>
        <?php
        if ($data['pkn'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['pkn'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['pkn'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Bahasa Indonesia</label></td>
        <td><?= @$data['bindo'] ?></td>
        <?php
        if ($data['bindo'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['bindo'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['bindo'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Bahasa Inggris</label></td>
        <td><?= @$data['binggris'] ?></td>
        <?php
        if ($data['binggris'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['binggris'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['binggris'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Seni Budaya</label></td>
        <td><?= @$data['senbud'] ?></td>
        <?php
        if ($data['senbud'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['senbud'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['senbud'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Pendidikan Jasmani, Olahraga dan Kesehatan</label></td>
        <td><?= @$data['penjas'] ?></td>
        <?php
        if ($data['penjas'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['penjas'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['penjas'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Kewirausahaan</label></td>
        <td><?= @$data['pkwu'] ?></td>
        <?php
        if ($data['pkwu'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['pkwu'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['pkwu'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
    <tr>
        <td><label>Matematika</label></td>
        <td><?= @$data['mtk'] ?></td>
        <?php
        if ($data['mtk'] >= 90) {
            $ket = "Luar Biasa";
        } elseif ($data['mtk'] >= 85) {
            $ket = "Sangat Baik";
        } elseif ($data['mtk'] >= 75) {
            $ket = "Baik";
        } else {
            $ket = "Buruk";
        }
        ?>
        <td><?= @$ket ?></td>
    </tr>
</table>
<hr width="100%">
<p>Hasil Ujian Tanggal 22 September tahun 2020, dengan demikian maka siswa/i dinyatakan </p>
<center>
    <?php
    $total = $data['pai'] + $data['pkn'] + $data['bindo'] + $data['binggris'] + $data['senbud'] + $data['penjas'] + $data['pkwu'] + $data['mtk'];
    $rata = @$total / 8;
    if ($rata >= 75) {
        $konklusi = "Lulus";
    } else {
        $konklusi = "Tidak Lulus";
    }
    ?>
    <h1>
        <p style="line-height: 40%;"><?= $konklusi ?></p>
        <h1>
</center>
<p>Demikian surat Laporan Hasil Ujian ini diberikan, Semoga Siswa/i dan Wali Siswa/i Bisa puas dengan Hasil yang diraih</p>
<hr width="100%">
<h3 style="text-align: right;">Mengetahui, Kepala Sekolah</h3>
<img src="logo/ttd.jpg" align="right">
<br><br><br><br><br><br><br><br><br>
<h4 style="text-align: right;">Sri Wahyuningsih, S.pd.</h4>
<center>
    <strong>Copyright</strong>&copyRakhis ; <script>
        document.write(new Date().getFullYear())
    </script>
</center>
<script>
    window.print();
</script>