<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Mes annonces</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/annonces">Liste des annonces</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                        <?php if (in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link"><?= $_SESSION['user']['email'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users/profil">Profil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/users/logout">Déconnexion</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/users/login">Connexion</a>
                        </li>

                    <?php endif; ?>



                </ul>

            </div>
        </div>
    </nav>
    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['erreur'];
            unset($_SESSION['erreur']); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['erreurConnexion'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['erreurConnexion'];
            unset($_SESSION['erreurConnexion']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['bienvenu'])) : ?>
        <div class="alert alert-success" role="alert">


            <h4 class="alert-heading">Votre site qui se rapproche toujours de vous.</h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <?php echo $_SESSION['bienvenu'];
            unset($_SESSION['bienvenu']); ?>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
    <?php endif; ?>

    <div class="contenu" style="padding: 0 auto;">



        <?= $contenu ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>