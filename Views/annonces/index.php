<h1>La liste des annonces</h1>
<?php foreach ($annonces as $annonce) : ?>

    <article>
        <h2><?= $annonce->titre ?></h2>

    </article>
<?php endforeach; ?>