<?php
$host = "localhost";
$user = "root";
$password = "aion";
$dbname = "al_server_gs"; // ou a base onde está account_data

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["total" => "Erro", "elyos" => "Erro", "asmos" => "Erro"]);
    exit;
}

// Substitui conforme os nomes certos das colunas
$sql_total = "SELECT COUNT(*) as total FROM account_data WHERE loggedin = 1";
$sql_elyos = "SELECT COUNT(*) as elyos FROM account_data WHERE loggedin = 1 AND faction = 0";
$sql_asmos = "SELECT COUNT(*) as asmos FROM account_data WHERE loggedin = 1 AND faction = 1";

$total = $conn->query($sql_total)->fetch_assoc()['total'];
$elyos = $conn->query($sql_elyos)->fetch_assoc()['elyos'];
$asmos = $conn->query($sql_asmos)->fetch_assoc()['asmos'];

echo json_encode(["total" => $total, "elyos" => $elyos, "asmos" => $asmos]);
$conn->close();
?>
