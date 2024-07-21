<?php

// Liste des membres
$url_members = '/frm/v2/forms/22/entries?page_size=500';
$url_teams = '/frm/v2/forms/25/entries?page_size=100';

// Requête membres
$req1 = curl_init();
curl_setopt($req1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($req1, CURLOPT_URL, $url_members);
curl_setopt($req1, CURLOPT_HTTPHEADER, $http_header);
$results_members=curl_exec($req1);
curl_close($req1);

// Requête teams
$req2 = curl_init();
curl_setopt($req2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($req2, CURLOPT_URL, $url_teams);
curl_setopt($req2, CURLOPT_HTTPHEADER, $http_header);
$results_teams=curl_exec($req2);
curl_close($req2);

$fp1 = fopen('./data_members.json', 'w');
fwrite($fp1, $results_members);
fclose($fp1);

$fp2 = fopen('./data_teams.json', 'w');
fwrite($fp2, $results_teams);
fclose($fp2);


header("Location: ./index.php");


?>
