<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Data Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0px;
            margin: 0;
        }

        table {
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: rgb(15, 15, 123);
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }
                .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .navbar .title {
            flex-grow: 1;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<?php
// JSON Data
$x = array("OPEN" => [], "SC" => [], "ST" => [], "EWS" => [], "EWS-P" => [], "SC-P" => [], "ST-P" => [], "OPEN-P" => [], "OBC" => [], "OBC-P" => []);

$dir = scandir("./R");
for ($i = 2; $i < count($dir); $i++) {
    $d=$dir[$i];
    $file = fopen("./R/" . $d, "r");
    $dat = json_decode(fread($file, 2000));
    array_push($x[explode("_", $d)[0]] , $dat);
}




// Open a directory, and read its contents

?>

<body>
    <div class="navbar">
        <div class="title">My Page</div>
        <a href="#abbreviation">Abbreviation</a>
        <a href="form.html">Survey Form</a>
    </div>

    <h1>JSON Data Representation in Table</h2>
        <?php
        foreach ($x as $category => $values) {
            echo "<h2>$category :</h2>";
            echo "<table>";
            echo "<tr><th>Rank</th><th>Seat Pool</th><th>Institute - Branch</th></tr>";
            for ($i=0; $i < count($values); $i++)  {
                echo "<tr>";
                $v=$values[$i];
                echo "<td>" . $v->rank . "<sup>".$v->exam."</sup></td>";
                echo "<td>" . $v->seatpool . "</td>";
                echo "<td>" . $v->institute . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

</body>

</html>