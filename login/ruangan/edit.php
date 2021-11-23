<?php
// include database connection file
include "../fungsi.php";

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $kelembaban = $_POST['kelembaban'];
    $suhu = $_POST['suhu'];
    $waktu_input = $_POST['waktu_input'];

    // update user data
    $result = mysqli_query($conn, "UPDATE tb_set_poin SET nama_ruangan='$nama_ruangan',kelembaban='$kelembaban',suhu='$suhu',waktu_input='$waktu_input' WHERE id_ruangan=$id");

    // Redirect to homepage to display updated user in list
    header("Location: indexruangan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tb_set_poin WHERE id_ruangan=$id");

while ($r = mysqli_fetch_array($result)) {
    $nama_ruangan = $r['nama_ruangan'];
    $kelembaban = $r['kelembaban'];
    $suhu = $r['suhu'];
    $waktu_input = $r['waktu_input'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-md">
                <h2><i class="bi bi-pencil-square"></i> Edit Data</h2>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" required value="<?php echo $nama_ruangan ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kelembaban</label>
                        <input type="text" class="form-control" name="kelembaban" placeholder="Kelembaban" required value="<?php echo $ph ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Suhu</label>
                        <input type="text" class="form-control" name="suhu" placeholder="Suhu" required value="<?php echo $suhu ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Waktu Input</label>
                        <input type="datetime-local" class="form-control" name="waktu_input" value="<?php echo $waktu_input ?>" required>
                    </div>
                    <a href="indexruangan.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>