<h1>La liste des annonces</h1>
<?php foreach ($annonces as $annonce) : ?>

    <article>
        <h2><a href="/annonces/lire/<?= $annonce->id ?>"><?= $annonce->titre ?></a></h2>
        <h2><?= $annonce->description ?></h2>
    </article>
<?php endforeach; ?>