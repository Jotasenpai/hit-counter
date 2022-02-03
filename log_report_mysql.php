<!DOCTYPE html>
<html>

  <head>
    <title>Site Visits Report</title>
  </head>

  <body>

      <h1>Site Visits Report</h1>

      <table border = '1'>
        <tr>
          <th>No.</th>
          <th>Visitor</th>
          <th>Total Visits</th>
        </tr>

        <?php
$user = "juanma-prueba";
$password = "1234";
$database = "juanma";
$table = "contador";

            try {
		$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
		$query = $db->prepare("SELECT * FROM contador");
		$query->execute();
		$filas = $query->fetchAll(PDO::FETCH_OBJ);

		foreach($filas as $fila) {
                    echo "<tr>";
                      echo "<td align = 'left'>".$fila->id."</td>";
                      echo "<td align = 'left'>".$fila->ip."</td>";
                      echo "<td align = 'right'>".$fila->visitas_total."</td>";
                    echo "</tr>";
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        ?>

      </table>
  </body>

</html>
