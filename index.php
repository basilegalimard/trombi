<?php
include ("_members_list.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pragati+Narrow:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="icon" href="../favicon.ico">
    <script src="../js/script.js"></script>
    <title>TrombinO</title>
  </head>
  <body>

<div class="topnav" style="position:fixed; background-color:#fff; width:100%;">
  <a class="active" href="?">TrombinO</a>
  
  <!-- CTA refresh data -->
  <div style="position:absolute;top:13px;left:136px;"><button onclick="window.location.href='./fetch.php';">DEBUG : Forcer la mise à jour des données (peut prendre jusqu'à 10 secondes)</button></div>
  
  <div class="search-container">
    <form action="">
      <input type="text" placeholder="Rechercher..." name="s">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<div id="container">


<?php
if (isset($_GET["s"]) && count($team_members) > 0 ) {
?>
  <div class="search_results">
    <span>Résultats de la recherche "<?= $_GET["s"] ?>"</span>
  </div>
<?php
}
elseif (isset($_GET["s"]) && count($team_members) == 0 ) { ?>
  <div class="search_results">
    Aucun résultat ne correspond à "<?= $_GET["s"] ?>"
  </div>
<?php
};
 ?>


<?php foreach ($teams as $key => $team) { ?>
  <a class="anchor" id="<?= str_replace("/","-",$key) ?>"></a>
  <div class="team">
    <div class="team-title">
      <p title="<?= $key ?>"><?= $key ?></p>
      <?php if (isset($_GET["s"])) { ?>
           <a href="?#<?= str_replace("/","-",$key) ?>">Voir l'équipe</a>
      <?php }; ?>
    </div><!-- .team-title -->
    <div class="team-members">

<?php
  foreach ($team as $team_member) {
    $thumbnail = "../../../wp-content/uploads/sites/5/formidable/22/" . strtolower($team_member['meta']['f6dap-identite-value']['last']) . "_" . strtolower($team_member['meta']['f6dap-identite-value']['first']) .".jpg";
    if (!file_exists($thumbnail)) {
      $thumbnail = "../media/placeholder.jpg";
    };
  $offset = rand(0,1200)
?>
    <div class="team-member" style="background-position-x:<?= $offset ?>px;">
      <img src="<?= $thumbnail ?>" alt="" loading="lazy">
      <span class="member-name"><span class="civilite"><?= $team_member['meta']['89ks5-grade-civilite'] ?></span> <?= $team_member['meta']['f6dap-identite'] ?></span>
      <span class="member-title"><?= $team_member['meta']['mgsvi-titre-fonction'] ?></span>
    </div><!-- .team-member -->

  <?php }; ?>

  </div><!-- .team-members -->
  </div><!-- .team -->
<?php }; ?>


</div><!-- #container -->

<div id="footer">
<span>Version du 17 juillet 2023 - <a href="mailto:communication@sgdsn.gouv.fr">Contact</a></span>

</div><!-- #footer -->




  </body>
</html>
