<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Cloudy</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

<?php
  $mysqli = new mysqli('mysql-rds-database.clthni2agtou.eu-west-3.rds.amazonaws.com', 'administrator','Database33!', 'RDS');
  $mysqli->set_charset("utf8");
  $requete = "SELECT * FROM COMMENTS";
  $resultat = $mysqli->query($requete);
?>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <section class="vh-500" style="background-color: #eee;">
        <div>
            <img src="lokilechat.jpg" alt="loki" class="rounded mx-auto pt-4 d-block">
            <h2 class="text-center" style="padding-top: 8px;">Loki le poti chat</h2>
            <p></p>
        </div>

        <div class="container justify-content-center mt-2 border-left border-right">
          <div class="d-flex justify-content-center pt-3 pb-2"> <input type="text" name="text" placeholder="Il est pipou ? Dis le nous !" class="form-control addtxt"> </div>
          <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2"> <span class="text1">Il est trop pipou !</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2">Marie</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2"> <span class="text1">ᵢₗ ₐ ₘᵢₜ ₗₑ ₖᵢₘₒₙₒ</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/jzrNkY0.png" width="18"><span class="text2">Julien Mari</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">16</span></div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2"> <span class="text1">Quelle bouille</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2">Philippe</span></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">7</span></div>
              </div>
            </div>
          </div>
         <?php
         while ($ligne = $resultat->fetch_assoc()) { ?>
          <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2"> <?php echo $ligne['Comment']. '<br>'?>
                <div class="d-flex justify-content-between py-1 pt-2">
                <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><?php echo $ligne['Auteur']. '<br>' ?></div>
                <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span></div>
            </div>
          </div>
         <?php } ?>
         <?php
         $mysqli->close();
         ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="text-center">
            <a href="index.php" class="pl-5">Me déconnecter</a>
        </div>
    </section>
  </body>
</html>