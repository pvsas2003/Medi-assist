<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
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

        .medicine-details-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .medicine-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }

        .medicine-info {
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

        .medicine-logo {
            width: 100%;
            max-width: 200px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container medicine-details-container">
        <?php
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "medidb";
            $conn = "";

            try {
                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
            } catch (mysqli_sql_exception) {
                echo "could not connect";
            }

            $medicineId = isset($_GET['id']) ? $_GET['id'] : null;

            $sql = "SELECT * FROM medicines WHERE MedicineID = $medicineId";
            $result = mysqli_query($conn, $sql);

            if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $medicineDetails = $row;
            } else {
                // Handle medicine not found
                echo "Medicine not found";
                exit;
            }

            // Fetch details from the row based on $medicineId and display them
            $medicineName = $medicineDetails["MedicineName"];
            $medicinePrice = $medicineDetails["Price"];

        ?>

        <h2 class="medicine-name"><?php echo $medicineName; ?></h2>
        <p class="medicine-info">Price: <?php echo $medicinePrice; ?></p>
        <!-- Add more details as needed -->

        <!-- Book Appointment Button -->
        <button class="book-appointment-btn">Order Medicine</button>
    </div>
</body>
</html>
