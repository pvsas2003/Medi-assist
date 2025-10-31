<?php
   include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medissitaint</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url("https://www.locumjobsonline.com/blog/wp-content/uploads/2018/03/what-doctors-wish-their-patients-knew.jpg"); /* Replace 'your_image_url_here.jpg' with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff; /* Blue submit button */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label>username</label><br>
        <input type="text" name="username"><br>
        <label>password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="phone_number">
    </form>
</body>
</html>
<?php
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){

      $username=filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
      $password=filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS);

      if(empty($username)){
        echo "enter the username";
      }elseif (empty($password)) {
        echo "enter the password";
      }
      else{
        $sql="SELECT *FROM users where username='$username'";
       $result=mysqli_query($conn,$sql);
       $row=mysqli_fetch_assoc($result,);
       $pass= $row["password"];
       $ciphering = "AES-128-CTR";
 
       // Use OpenSSl Encryption method
       $iv_length = openssl_cipher_iv_length($ciphering);
       $options = 0;
        
       // Non-NULL Initialization Vector for encryption
       $encryption_iv = '1234567891011121';
        
       // Store the encryption key
       $encryption_key = "medi";
        
       // Use openssl_encrypt() function to encrypt the data
       $encryption = openssl_encrypt($password, $ciphering,
                   $encryption_key, $options, $encryption_iv);
       $hash=password_hash($password,PASSWORD_DEFAULT);
       if($encryption==$pass){
        header("Location:./home/hospital.html");
       }
       else{
        echo "the password is incorrect";
       }
      }

  }
    mysqli_close($conn);
?>
