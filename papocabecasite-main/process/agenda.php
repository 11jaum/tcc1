<?php
include('connection/connect.php');
$user_id = intval($_COOKIE['ID']); // Pegando o ID do usuário logado

$stmt = $con->prepare("SELECT nome, data_consulta, hora, descricao FROM consulta WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Minhas Consultas</h1>";
echo "<table border='1'><tr><th>Nome</th><th>Data</th><th>Hora</th><th>Descrição</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nome']}</td>
        <td>{$row['data_consulta']}</td>
        <td>{$row['hora']}</td>
        <td>{$row['descricao']}</td>
    </tr>";
}
echo "</table>";
?>
