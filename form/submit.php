<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "deneme";

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Ekleme işlemi için hazırla ve bağla
$stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $password, $phoneNumber);

// Form verilerini ayarla
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];

// İşlemi gerçekleştir
if ($stmt->execute()) {
    echo "Kayıt başarıyla eklendi.";
} else {
    echo "Kayıt ekleme hatası: " . $stmt->error;
}

// İşlemi kapat ve bağlantıyı kapat
$stmt->close();
$conn->close();
?>