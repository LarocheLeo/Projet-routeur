<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST["operation"];
    $hostname = $_POST["hostname"];
    $community = $_POST["community"];
    $oid = $_POST["oid"];
	$type = $_POST["type"];

    if ($operation === "get") {
        // Opération GET avec snmpget
        $snmp_result = snmpget($hostname, $community, $oid);
        if ($snmp_result !== false) {
            echo "<h2>Résultat de l'opération GET (snmpget) :</h2>";
            echo "<p>Valeurs de l'OID $oid :</p>";
            echo "<ul>";
			echo $snmp_result;
            echo "</ul>";
        } else {
            echo "<h2>Erreur :</h2>";
            echo "<p>Impossible d'effectuer l'opération GET (snmpget). Vérifiez les informations de connexion et l'OID.</p>";
        }
    } elseif ($operation === "set") {
        // Opération SET avec snmpset
        $value = $_POST["value"];
        $snmp_result = snmpset($hostname, $community, $oid, $type, $value);

        if ($snmp_result !== false) {
            echo "<h2>Résultat de l'opération SET :</h2>";
            echo "<p>Opération SET réussie pour l'OID $oid. Nouvelle valeur : $value</p>";
        } else {
            echo "<h2>Erreur :</h2>";
            echo "<p>Impossible d'effectuer l'opération SET (snmpset). Vérifiez les informations de connexion, l'OID et la valeur.</p>";
        }
    }
}
?>
