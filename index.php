<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Judul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <?php
            @session_start();
            include "koneksi.php";
            if (isset($_POST['login'])) {
                $sql = mysqli_query($con, "select * from tb_user where username='$_POST[username]' and password='$_POST[password]'");
                $hasil = mysqli_num_rows($sql);
                if ($hasil > 0) {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];
                    echo "<script>alert('selamat datang')</script>";
                    echo "<script>document.location.href='dashboard.php'</script>";
                } else {
                    echo "<script>alert('Username atau password salah')</script>";
                }
            }
            ?>
            <div class="txt_field">
                <input type="text" id="username" name="username" required>
                <span></span>
                <label for="username">Username</label>
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="pass">Lupa Password?</div>
            <input type="submit" name="login" value="Login">
            <div class="signup_link">
                Belum punya akun? <a href="page-register.html">Daftar</a>
            </div>
        </form>
    </div>

</body>

</html>