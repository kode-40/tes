<html>

    <head>
        <link rel="stylesheet" href="style Login.css">
    </head>
<body>
    <style>
        .error {color: red;}
        .radio-label {
            margin-left: 5px;
        }
        .radio-button {
            margin-right: -120px;
            margin-left: 110px;
        }
    </style>
    </body>
    <?php
    require 'koneksi.php';
    $namadepanErr = $namabelakangErr = $dobErr = $genderErr = $emailErr = $passwordErr = "";
    $namadepan = $namabelakang = $dob = $gender = $email = $password = "";
    if (mysqli_query($conn, $query_sql)) {
      header("location : index.html");
    } else {
      echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["namadepan"])) {
        $namadepanErr = "Name is required";
      } else {
        $namadepan = test_input($_POST["namadepan"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$namadepan)) {
          $namadepanErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["namabelakang"])) {
        $namabelakangErr = "Name is required";
      } else {
        $namabelakang = test_input($_POST["namabelakang"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$namabelakang)) {
          $namabelakangErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["password"])) {
        $passwordErr = "password is required";
      } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$password)) {
          $passwordErr = "Only letters and white space allowed";
        }
      }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

<p style="color: blue;font-size: 60px;margin-left: 40%;">facebook</p>

<div1 style="background-color: white; margin-top: 55%;width: 34%;margin-left: -25%;">
    <p style="padding-left: 10px;margin-bottom: -3%;font-size: 23px;text-align: center;"><b>Buat Akun Baru</b></p>
    <p style="padding-left: 10px;text-align: center;">Ini Cepat dan mudah.</p>
    <hr>
    <p><span class="error"></span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" style="padding-left: 15px;">
        <input type="text" name="namadepan" placeholder="Nama depan" value="<?php echo $namadepan;?>" style="width: 45%;height: 40px;">
        <span class="error">* <?php echo $namadepanErr;?></span>
        <input type="text" name="namabelakang" placeholder="Nama belakang" value="<?php echo $namabelakang;?>" style="width: 45%;height: 40px;">
        <span class="error">* <?php echo $namabelakangErr;?></span>
        
        <p style="font-size: 80%;">Tanggal Lahir</p>
        <input type="number" required style="width: 30%;height: 40px;">
        <input type="text" required style="width: 30%;margin-left: 10px;height: 40px;">
        <input type="number" required style="width: 30%;margin-left: 10px;height: 40px;">
        <p style="font-size: 80%;">Jenis Kelamin</p>
        <div style="border: 2px gray;width: 30%;border-radius: 6px;">
        <input type="radio" name="gender" class="radio-button">
        <label for="option1" class="radio.label">Perempuan</label> <?php if (isset($gender) && $gender=="Perempuan") echo "checked";?>
        </div><div style="border: 2px gray;width: 30%;border-radius: 6px; margin-left: 33%;margin-top: -20px;">
        <input type="radio" name="gender" class="radio-button">
        <label for="option2" class="radio-label">Laki-laki</label> <?php if (isset($gender) && $gender=="Laki-laki") echo "checked";?> 
        </div><div style="border: 2px gray;width: 30%;border-radius: 6px; margin-left: 66%;margin-top: -20px;">
        <input type="radio" name="gender" class="radio-button">
        <label for="option3" class="radio-label">Khusus</label> <?php if (isset($gender) && $gender=="Khusus") echo "checked";?> 
        </div>

        <p></p>
        <input type="text" name="email" placeholder="Nomor seluler atau email" value="<?php echo $email;?>" style="width: 96%;margin-bottom: 10px;height: 40px;">
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="password" name="password" placeholder="Kata sandi baru" value="<?php echo $password;?>" style="width: 96%;height: 40px;">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br>
        <p style="font-size: 12px;font-family: Arial, Helvetica, sans-serif;color: gray;">Orang yang menggunakan layanan kami dapat mengunggah informasi kontak <br>
            Anda ke Facebook.Pelajari selengkapnya</p>
        <p style="font-size: 12px;font-family: Arial, Helvetica, sans-serif;color: gray ;">Dengan mengklik Daftar, Anda menyetujui Ketentuan, Kebijakan Privasi, dan <br>
            Kebijakan Cookie kami. Anda akan menerima Notifikasi SMS dari kami dan bisa <br>
            berhenti kapan saja.</p><br>  
        <button type="submit" name="submit" value="submit" cursor="pointer"
        style="margin-left: 25%;background-color:rgb(50, 194, 88);border-radius:7px; color: white; cursor: pointer;width:50%; height:40px">
        <b>Daftar</b></button>
        <p style="text-align: center;color: royalblue;cursor:pointer">Sudah memiliki akun?</p>
    </form>
</div1>
