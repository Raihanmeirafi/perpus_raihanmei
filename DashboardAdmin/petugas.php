<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="p-3 mb-2 border bg-secondary">
<form action="" class="row g-3 p-4 needs-validation" method="POST">
                    
                    <div class="form-group">
                        <label for="nama_admin">Nama Petugas:</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_admin">Kode Admin:</label>
                        <input type="text" class="form-control" id="kode_admin" name="kode_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">Nomor Telepon:</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" required>
                    </div>
                    <div class="col input-group mb-2">
          <label class="input-group-text" for="role">role :</label>
          <select class="form-select" id="role" name="role">
            <option selected>Choose</option>
            <option value="admin">admin</option>
            <option value="petugas">petugas</option>
            </select>
          </div>
                    <div class="form-group">
                    <button type="submit" name="signup" class="btn btn-primary">Tambah Petugas</button>
                </form>
        
                <?php require_once "../config/config.php";
        $conn = mysqli_connect("localhost", "root", "", "perpustakaan");
        $admin = queryReadData("SELECT * FROM admin");
        
        if(isset($_POST["signup"])) {
            // Ambil data yang dikirimkan melalui form
            $nama_admin = $_POST['nama_admin'];
            $password = $_POST['password'];
            $kode_admin = $_POST['kode_admin'];
            $no_tlp = $_POST['no_tlp'];
            $role = $_POST['role'];
        
            // Query untuk menambahkan petugas ke dalam tabel admin
            $sql = "INSERT INTO admin (nama_admin, password, kode_admin, no_tlp, role) 
                    VALUES ('$nama_admin', '$password', '$kode_admin', '$no_tlp','$role')";
        
            // Jalankan query
            if (mysqli_query($connection, $sql)) {
                // Jika query berhasil dijalankan, arahkan kembali ke halaman tambah petugas dengan pesan sukses
                header("Location: petugas.php?status=success");
                exit();
            } else {
                // Jika terjadi kesalahan, arahkan kembali ke halaman tambah petugas dengan pesan error
                header("Location: petugas.php?status=error");
                exit();
            }
        } ?>
        
</body>
</html>