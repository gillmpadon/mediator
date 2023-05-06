<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileDestination = 'user_img/' . $filename;
    
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        echo 'File uploaded successfully!';
        header("Location: update.html?photo=".$filename);
        exit();
    } else {
        echo 'File upload failed.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html,body{
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            background-color: #16181F;
        }
        .container{
            margin: auto;
            text-align: center;
            margin-top: 30%;
            width: 90%;
            height: 30em;
        }
       

        form{
            width: 100%;
            margin: auto;
            color: white;
        }
        img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 1em;
        }
        button{
            margin-top: 2em;
            width: 100%;
            height: 3em;
            border-radius: .5em;
        }
        @media (min-width: 708px ){
            .container{
                position: relative;
                width: 25%;
                margin-top: 5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <img id="photo" src="user_img/women.jpg" alt="image">
            <input type="file" name="file" required>
            <button type="submit">Upload</button>
        </form>
    </div>
    <script>
      const photo = document.getElementById("photo")
      const storedPhoto = localStorage.getItem("photo")
      if (storedPhoto) {
          photo.src = `user_img/${storedPhoto}`
      }
    </script>
</body>
</html>
