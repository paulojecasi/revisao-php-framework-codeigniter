<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Página Inicial -
                    <small>Postagens Recentes</small>
                </h1>

                <!-- First Blog Post -->
                <?php foreach ($postagens as $destaque) { ?>

                    <h2>
                        <a href="#"> <?php echo $destaque->titulo ?>  </a>
                    </h2>
                    <p class="lead">
                        por <a href="index.php"> <?php echo $destaque->subtitulo ?> </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span>
                        Postado em <?php echo $destaque->data ?> 
                    </p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                    <hr>
                    <p> <?php echo $destaque->conteudo ?></p>
                    

                    <hr>
                <?php 
                }
                ?>

            </div>
