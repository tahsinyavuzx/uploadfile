<!-- Bu kod, dosya yükleme formunu gösterecektir -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <img src="upload-icon.png" alt="Dosya Yükle" width="100" height="100">
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewFile()">
  <p>Dosya adı: <span id="fileName"></span></p>
  <button type="submit" name="submit">Yükle</button>
  <button type="button" onclick="cancelUpload()">İptal</button>
</form>

<!-- Bu kod, yüklenen dosyayı sunucuya yükleyecektir -->
<?php
  // Dosya yükleme formu gönderildiğinde
  if (isset($_POST['submit'])) {
    // Dosya yükleme işlemini başlat
    $target_dir = "uploads/"; // Dosyaların yükleneceği dizin
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Dosyanın tam yolu
    $uploadOk = 1; // Dosya yükleme durumu (1 = başarılı, 0 = başarısız)

    // Dosya boyutunu kontrol et
    if ($_FILES["fileToUpload"]["size"] > 2147483648) {
      echo "Üzgünüz, dosya boyutu en fazla 2GB olabilir.";
      $uploadOk = 0;
    }

    // Dosya türünü kontrol et (tüm dosyalar kabul edilecek)
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Dosya yükleme işlemini tamamla
    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Dosya ". basename( $_FILES["fileToUpload"]["name"]). " başarıyla yüklendi.";
      } else {
        echo "Üzgünüz, dosya yükleme sırasında bir hata oluştu.";
      }
    }
  }
?>

<!-- Bu JavaScript kodu, dos
