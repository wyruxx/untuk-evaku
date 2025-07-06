<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Wisuda</title>

    <link href="index_files/bootstrap.css" rel="stylesheet">
    <link href="index_files/font-awesome.css" rel="stylesheet">
    <link href="index_files/style.css" rel="stylesheet">
    <link href="index_files/style-responsive.css" rel="stylesheet">
    <link href="index_files/keyboard-dark.css" rel="stylesheet">

    <script src="index_files/jquery.js"></script>
    <script src="index_files/bootstrap.js"></script>
    <script src="index_files/main.js"></script>
</head>

<body>
<div>
    <div class="container">
        <div class="transbox">
            <div class="transbox-wrap">
                <?php
                if (!isset($_POST['submit'])) {
                ?>
                    <form method="POST" action="">
                        <input type="hidden" name="submit" value="yes">
                        <input type="submit" class="form-control" value="Aku mau lihat!">
                    </form>
                <?php
                } else {
                    // Ambil data dari file ucapan.json
                    $json = file_get_contents("ucapan.json");
                    $data = json_decode($json, true); // decode as array

                    if ($data && isset($data['ucapan'][0])) {
                        $ucapan = $data['ucapan'][0];

                        // ✅ Tampilkan pesan ucapan
                        echo "<p align='justify'>{$ucapan['pesan']}</p>";

                        // ✅ Tampilkan dua gambar GIF
                        echo "<br><center><img class='img-responsive' src='images/20-taro-{$ucapan['gambar'][0]}.gif'></center>";
                        echo "<br><center><img class='img-responsive' src='images/21-taro-{$ucapan['gambar'][1]}.gif'></center>";
                    } else {
                        echo "<p style='color:red;'>Data ucapan tidak ditemukan atau rusak.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
