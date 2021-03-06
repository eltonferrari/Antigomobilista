<?php 
    session_start();
    if (!isset($_SESSION['valid'])) {
        header('Location: ../access/login.php');
    }
?>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1">
        <title>Página Inicial</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" 
              rel="stylesheet" 
              type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" 
              rel="stylesheet"> 
        <link rel="stylesheet" 
              href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="../../assets/css/style.css">
        <link rel="stylesheet"
              href="../../assets/css/template_menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include '../template/menu.php';?>
        <div class="col-md-12">
            <div class="col-md-4 tit">
                <div class="title">
                    <br />
                    MINHAS IMAGENS
                    <br />
                </div>
                <a href="../posts/add.php" 
                   title="Adicionar novas fotos">
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <font class="add">
                        Adicionar
                    </font>
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <br />
                    <br />
                </a>
                <div id="carousel-example-generic" 
                     class="carousel slide" 
                     data-ride="carousel">
                    <?php
                        $activeControl = 2;
                        $iduser = $_SESSION['iduser']
                    ?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" 
                         role="listbox">
                        <?php
                            $activeControl = 2;
                            $result = "SELECT * FROM posts WHERE iduser=". $iduser . " ORDER BY created_at ASC";
                            $res = mysqli_query($mysqli, $result);
                            while ($row_carousel = mysqli_fetch_assoc($res)) {
                                if ($activeControl == 2) {
                        ?>
                                    <div class="item active">
                                        <div class="gallery">
                                            <a href="../posts/view_one.php?idpost=<?php 
                                                                             echo $row_carousel['idpost'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/posts/<?php 
                                                                                 echo $row_carousel['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                    $activeControl = 1;
                                } else {
                        ?>
                                    <div class="item">
                                        <div class="gallery">
                                            <a href="../posts/view_one.php?idpost=<?php 
                                                                             echo $row_carousel['idpost'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/posts/<?php 
                                                                                 echo $row_carousel['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>					
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" 
                       href="#carousel-example-generic" 
                       role="button" 
                       data-slide="prev">
                        <span class="glyphicon 
                                     glyphicon-chevron-left" 
                              aria-hidden="true"></span>
                        <span class="sr-only">
                            Previous
                        </span>
                    </a>
                    <a class="right carousel-control" 
                       href="#carousel-example-generic" 
                       role="button" 
                       data-slide="next">
                        <span class="glyphicon 
                                     glyphicon-chevron-right" 
                                     aria-hidden="true"></span>
                        <span class="sr-only">
                            Next
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="title">
                    <br />
                    Eventos
                    <br />
                    <br />
                </div>
                <div id="carousel-example-generic-event" 
                     class="carousel slide" 
                     data-ride="carousel">
                    <?php
                        $actCont = 2;
                        $iduser = $_SESSION['iduser']
                    ?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" 
                         role="listbox">
                        <?php
                            $actCont = 2;
                            $result = "SELECT * FROM events ORDER BY date ASC";
                            $resEvent = mysqli_query($mysqli, $result);
                            while ($row_carouselEvent = mysqli_fetch_assoc($resEvent)) {
                                if ($actCont == 2) {
                        ?>
                                    <div class="item active">
                                        <div class="gallery">
                                            <a href="../events/view.php?idevent=<?php 
                                                                             echo $row_carouselEvent['idevent'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/events/<?php 
                                                                                 echo $row_carouselEvent['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                    $actCont = 1;
                                } else {
                        ?>
                                    <div class="item">
                                        <div class="gallery">
                                            <a href="../events/view.php?idevent=<?php 
                                                                             echo $row_carouselEvent['idevent'];
                                                                                ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/events/<?php 
                                                                                 echo $row_carouselEvent['image'];
                                                                              ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>					
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" 
                       href="#carousel-example-generic-event" 
                       role="button" 
                       data-slide="prev">
                        <span class="glyphicon 
                                     glyphicon-chevron-left" 
                              aria-hidden="true"></span>
                        <span class="sr-only">
                            Anterior
                        </span>
                    </a>
                    <a class="right carousel-control" 
                       href="#carousel-example-generic-event" 
                       role="button" 
                       data-slide="next">
                        <span class="glyphicon 
                                     glyphicon-chevron-right" 
                                     aria-hidden="true"></span>
                        <span class="sr-only">
                            Próximo
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="title">
                    <br />
                    Vendas
                    <br />
                </div>
                <a href="../posts/add.php" 
                   title="Adicionar novas fotos">
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <font class="add">
                        Adicionar
                    </font>
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <br />
                    <br />
                </a>
                <?php
                    $result = mysqli_query($mysqli, "SELECT * FROM posts WHERE sell=1 ORDER BY created_at ASC");
                    while ($res = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="box-detail">
                            <div class="box-inner box-color">
                                <a href="../posts/view_one.php?idpost=<?php 
                                                                 echo $res['idpost'];
                                                             ?>">
                                    <img class="img-responsive" 
                                         src="../../images/posts/<?php 
                                                                     echo $res['image'];
                                                                 ?>">
                                </a>
                            </div>
                        </div>
                <?php
                    }
                ?>                
            </div>
        </div>
    </body>
</html>