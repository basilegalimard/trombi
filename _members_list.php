<?php

include ("_normalize.php");

$jsonpath = "./data_members.json";
$results = file_get_contents($jsonpath);
$team_members = json_decode($results, true);

$team_members_filtered = [];
$teams = [];
$team_title = "";


// on filtre la liste d'agents
if (isset($_GET["s"])){
    foreach ($team_members as $team_member) {
        if ( strpos(strtolower(normalize($team_member['meta']['f6dap-identite'])), strtolower(normalize($_GET["s"]))) !== false ) {
            $team_members_filtered[] = $team_member;
        };
    };
    $team_members = $team_members_filtered;
};

usort($team_members, function ($a, $b) {
    return $a['meta']['re0co-member-rank'] <=> $b['meta']['re0co-member-rank'];
});
usort($team_members, function ($a, $b) {
    return $a['meta']['iztke-team-rank'] <=> $b['meta']['iztke-team-rank'];
});

// on compose les liste d'équipes
foreach ($team_members as $key => $team_member) {
  if ($team_member['meta']['2vpcw-rattachement'] != $team_title) {
    $team_title = $team_member['meta']['2vpcw-rattachement'];
  };
  $teams[$team_title][] = $team_member;
};

?>

