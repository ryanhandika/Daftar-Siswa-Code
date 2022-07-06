<?php
$host      = "localhost";
$user      = "root";
$pass      = "";
$db        = "phpcrud";

$koneksi   = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("gagal");
}
$nama     = "";
$email    = "";
$kelas    = "";
$jurusan  = "";
$sukses   = "";
$error    = "";

if (isset($_POST['simpan'])) {
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $kelas     = $_POST['kelas'];
    $jurusan   = $_POST['jurusan'];

    if ($nama && $email && $kelas && $jurusan) {
        $sqli = "insert into kontak(nama,email,kelas,jurusan) values ('$nama', '$email', '$kelas', '$jurusan')";
        $sq1  = mysqli_query($koneksi, $sqli);
        if ($sq1) {
            $sukses   = "berhasil memasukan data";
        } else {
            $error    = "gagal memasukan data";
        }
    } else {
        $error = "Silahkan masukan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa XI PPLG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }
        
        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukan data -->
        <div class="card">
            <div class="card-header">
                Creat / Edit data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="">->Pilih kelas<-</option>
                                <option value="X" <?php if($kelas == "X") echo "selected" ?>>X</option>
                                <option value="XI" <?php if($kelas == "XI") echo "selected" ?>>XI</option>
                                <option value="XII" <?php if($kelas == "XII") echo "selected" ?>>XII</option>
                            </select>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">jurusan</label>
                        <div class="col-sm-10">
                            <select name="jurusan" class="form-control ms-1 mt-3" id="jurusan">
                                <option value="">->Pilih jurusan<-</option>
                                <option value="RPL" <?php if ($jurusan == "RPL") echo "selected" ?>>RPL</option>
                                <option value="TKJ" <?php if ($jurusan == "TKJ") echo "selected" ?>>TKJ</option>
                                <option value="TMI" <?php if ($jurusan == "TMI") echo "selected" ?>>TMI</option>
                                <option value="OTKP" <?php if ($jurusan == "OTKP") echo "selected" ?>>OTKP</option>
                                <option value="TKR" <?php if ($jurusan == "TKR") echo "selected" ?>>TKR</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" id="" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Siswa XI PPLG
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</body>
</html>