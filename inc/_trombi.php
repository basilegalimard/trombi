<?php
$team_members = array_map('str_getcsv', file('data/trombi-data-2022-12-09a.csv'));

$team_members_filtered = [];
$teams = [];
$team_title = "";

// Remplace tous les accents par leur équivalent sans accent.
function normalize ($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
    );
    return strtr($string, $table);
};

if (isset($_GET["s"])){

// on filtre la liste d'agents
  foreach ($team_members as $team_member) {
    // echo $team_member[6];
    if ( strpos(strtolower(normalize($team_member[6])), strtolower(normalize($_GET["s"]))) !== false || strpos(strtolower(normalize($team_member[7])), strtolower(normalize($_GET["s"]))) !== false ) {
      // echo ("yep ");
      $team_members_filtered[] = $team_member;
    };
  };
  $team_members = $team_members_filtered;
};


foreach ($team_members as $team_member) {
  if ($team_member[0] != $team_title) {
    $team_title = $team_member[0];
  };
  $teams[$team_title][] = $team_member;
};
?>
