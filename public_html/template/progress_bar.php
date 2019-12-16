<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" 
              rel="stylesheet" 
              type="text/css">
        <link rel="stylesheet" 
              href="../../assets/bootstrap_3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="../../assets/css/style_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="col-md-12">
            <?php
                $game = mysqli_query($conection, "SELECT points, "
                                                   . "level, "
                                                   . "firstpoint, "
                                                   . "lastpoint "
                                            . "FROM users, "
                                                 . "ratings "
                                            . "WHERE iduser=" . $_SESSION['iduser'] . " "
                                            . "AND firstpoint<=points "
                                            . "AND lastpoint>=points");
                while ($resGame = mysqli_fetch_array($game)) {
                    $points = $resGame['points'];
                    $level = $resGame['level'];
                    $firstpoint = $resGame['firstpoint'];
                    $lastpoint = $resGame['lastpoint'];
                }
                $progress = (100/($lastpoint - $firstpoint))*($points - $firstpoint);
            ?>
            <div class="col-md-4 text-bar-left">
                <?php
                    echo "Min. " . $firstpoint;
                ?>
            </div>
            <div class="col-md-4 bar">
                <div class="progress" 
                     style="margin: 0 10%">                    
                    <div class="progress-bar progress-bar-striped active" 
                         role="progressbar" 
                         aria-valuenow="100" 
                         aria-valuemin="0" 
                         aria-valuemax="100" 
                         style="width:<?php echo $progress; ?>%">
                    </div>
                </div>
            </div>        
            <div class="col-md-4 text-bar-right">
                <?php
                    echo "Level: " . $level . " - Pontos: " . $points . " / " . $lastpoint . " Máx.";                    
                ?>
                <a href="../gamification/ranking.php">
                    <button type="submit"   
                            name="submit"
                            value="Submit"
                            class="btn btn-b">
                        <span class="glyphicon glyphicon-list-alt"
                              title="Adicionar/Salvar Comentário">
                        </span>
                        <font class="buttons">
                            Ranking
                        </font>
                    </button>
                </a>
            </div>
        </div>
    </body>
</html>