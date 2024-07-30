<?php
include 'connect.php';

$sql = "SELECT H.nombre, COUNT(R.id_reserva) AS total_reservas
        FROM HOTEL H
        JOIN RESERVA R ON H.id_hotel = R.id_hotel
        GROUP BY H.id_hotel
        HAVING total_reservas > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Hotel</th><th>Total Reservas</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["total_reservas"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron hoteles con más de dos reservas";
}

$conn->close();
?>
