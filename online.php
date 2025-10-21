
<?php
$host = "localhost";
$user = "root";
$password = "aion";
$dbname = "al_server_ls"; // adapta este nome à tua base de dados

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["error" => "Erro na ligação à base de dados"]);
    exit;
}

$sql_total = "SELECT COUNT(*) as total FROM players WHERE online = 1";
$sql_elyos = "SELECT COUNT(*) as elyos FROM players WHERE online = 1 AND race = 'ELYOS'";
$sql_asmos = "SELECT COUNT(*) as asmos FROM players WHERE online = 1 AND race = 'ASMODIANS'";

$total = $conn->query($sql_total)->fetch_assoc()['total'];
$elyos = $conn->query($sql_elyos)->fetch_assoc()['elyos'];
$asmos = $conn->query($sql_asmos)->fetch_assoc()['asmos'];

echo json_encode(["total" => $total, "elyos" => $elyos, "asmos" => $asmos]);
$conn->close();
?>
