<?php
     $db_server="localhost";
     $db_user="root";
     $db_pass="";
     $db_name="medidb";
     $conn="";

     try{
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
      }
      catch(mysqli_sql_exception){
       echo "couldnot connect";
      }
      $sql="SELECT *FROM hospitals";
      $result=mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[]=$row;            
    }
	?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .hospital-container {
            margin-top: 20px;
        }

        .hospital-card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            display: flex;
            width: 100%;
            cursor: pointer;
            text-decoration: none; /* Remove underlines from the links */
            color: inherit; /* Use the default text color */
        }

        .hospital-card:hover {
            transform: scale(1.05);
        }

        .hospital-logo {
            width: 100%;
            max-width: 150px;
            height: auto;
            border-radius: 8px 0 0 8px;
        }

        .hospital-details {
            flex-grow: 1;
            padding: 15px;
        }

        .hospital-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }

        .hospital-info {
            font-size: 16px;
            color: #495057;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container hospital-container">
        <?php foreach ($data as $item): ?>
            <div class="row">
                <div class="col-sm-12">
                    <a href="hospital_details.php?id=<?php echo $item['id']; ?>" class="hospital-card">
                        <img class="hospital-logo" src="<?php echo $item["image"]; ?>" alt="Hospital Logo">
                        <div class="hospital-details">
                            <h4 class="hospital-name"><?php echo $item["name"]; ?></h4>
                            <p class="hospital-info"><?php echo $item["email"]; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
