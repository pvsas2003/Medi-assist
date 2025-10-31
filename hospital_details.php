<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your Custom CSS Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .hospital-details-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hospital-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }

        .hospital-info {
            font-size: 18px;
            color: #495057;
            margin-bottom: 15px;
        }

        .book-appointment-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }

        .book-appointment-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container hospital-details-container">
        <?php
            // Retrieve hospital details based on the 'id' parameter from the URL
            $hospitalId = isset($_GET['id']) ? $_GET['id'] : null;
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
             $sql="SELECT *FROM hospitals where id=$hospitalId";
             $result=mysqli_query($conn,$sql);
             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // Fetch details from the row$rowbase using $hospitalId and display them
            // Replace the following lines with actual row$rowbase query and fetching logic
            $hospitalName = $row["name"];
            $hospitalEmail = $row["email"];
            $hospitalAddress = $row["address"];
        ?>
        <img class="hospital-logo" src="<?php echo $row["image"]; ?>" alt="Hospital Logo">
        <h2 class="hospital-name"><?php echo $hospitalName; ?></h2>
        <p class="hospital-info">Email: <?php echo $hospitalEmail; ?></p>
        <p class="hospital-info">Address: <?php echo $hospitalAddress; ?></p>
        <!-- Add more details as needed -->

        <!-- Book Appointment Button -->
        <button class="book-appointment-btn">Book Appointment</button>
    </div>
</body>
</html>
