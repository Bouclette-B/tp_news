<div class="container">
    <div class="row row-title">
        <div class="col-3"></div>
        <div class="col-6">
            <h2>Suppression d'une news</h2>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <p>Êtes-vous sûr(e) de vouloir supprimer cette news ?</p>
            <h3><strong>Titre : </strong><?= $news->getTitle() ?></h3>
            <p><strong>Auteur : </strong><?= $news->getAuthor() ?></p>
            <p><strong>Date de création : </strong><?= $news->getCreationDate()->format('d/m/Y') ?></p>
        </div>
        <div class="col-3"></div>
    </div><?php
    if(!$methodIsPost){?>
        <form action="" class="row row-button" method="post">
            <div class="col-3"></div>
            <div class="col-6">
                <button class="btn btn-danger" type="submit" name="delete">Oui</button>
                <a href="index.php?action=newsAdmin" class="btn btn-info">Non</a>
            </div>
            <div class="col-3"></div>
        </form><?php
    }else{?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <p><?= $deleteMessage ?></p>
                <a href="index.php?action=newsAdmin" class="btn btn-info">Retour</a>
            </div>
        </div><?php
    }?>

</div>