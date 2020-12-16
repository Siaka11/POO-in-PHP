<h1>Formulaire de connexion</h1>
<?php if (!empty($_SESSION['erreur'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['erreur'];
        unset($_SESSION['erreur']); ?>
    </div>
<?php endif; ?>
<?= $loginForm ?>