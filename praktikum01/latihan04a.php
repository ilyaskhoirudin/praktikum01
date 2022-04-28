<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 04 - PHP dan Database</title>
    <link rel="stylesheet" href="latihan01a.css">
</head>
<body>
    <h1>Klasemen Sementara (HTML + PHP Database)</h1>
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "praktikum01";

        $conn = new mysqli($server, $username, $password, $db);
        if ($conn->connect_error) {
            exit("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT rank, name, points, team FROM klasemen";
        $result = $conn->query($query);
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Points</th>
                <th>Team</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0) {
                while($racer = $result->fetch_assoc()) {
                    echo(
                        "<tr>
                            <td>" . $racer["rank"] . "</td>
                            <td>" . $racer["name"] . "</td>
                            <td>" . $racer["points"] . "</td>
                            <td>" . $racer["team"] . "</td>
                        </tr>"
                    );
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>