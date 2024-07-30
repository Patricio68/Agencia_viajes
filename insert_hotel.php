<?php
include 'conexion.php'; // Assuming conexion.php contains database configuration

// Get data from the form
$origen = trim($_POST['origen']);
$destino = trim($_POST['destino']);
$fecha = $_POST['fecha'];
$plazas_disponibles = (int) $_POST['plazas_disponibles'];
$precio = (float) $_POST['precio'];

// Basic data validation
if (empty($origen) || empty($destino) || empty($fecha) || $plazas_disponibles <= 0 || $precio <= 0) {
    die("Error: All fields are required and 'Plazas Disponibles' and 'Precio' must be positive numeric values.");
}

// Prepare SQL query
$sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing query: " . $conn->error);
}

// Bind parameters to the query
$stmt->bind_param("sssii", $origen, $destino, $fecha, $plazas_disponibles, $precio);

// Execute query and check result
if ($stmt->execute() === TRUE) {
    echo "New flight added successfully.";
} else {
    echo "Error executing: " . $stmt->error;
}

// Close resources
$stmt->close();
$conn->close();
?>



