<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        h1 {
            color: #4CAF50;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Thank You!</h1>
        
        
        <?php
    $arr = array("rank"=>$_POST["rank"],"seatpool"=>$_POST["seat-pool"],"institute"=> $_POST["institute"],"exam"=>$_POST['exam']);
    if (file_exists("./R/" . $_POST['category'].'_'. $_POST['rank'] . "_" .$_POST['exam'] .'.json')) {
        echo "<p style='color:red;f'>SEEMS  LIKE  YOU  HAVE  ALREADY  FILLED  THE  SURVEY !</p>";
    } else {
        $file = fopen("./R/". $_POST['category'].'_'. $_POST['rank']."_" .$_POST['exam'] . '.json', "w");
        fwrite($file, json_encode($arr));
        echo "<p>Your submission has been received successfully.</p>";
    }
    
    ?>
    <a href="index.php" class="button">Return to Homepage</a>
    </div>
</body>

</html>