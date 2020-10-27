<div class="container">
<div class="row row-title">
        <div class="col-3"></div>
        <div class="col-6">
            <h2>Rédiger une news</h2>
        </div>
        <div class="col-3"></div>
    </div>

    <form action="" method="post">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6" >
                <div class="form-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" name="author" required value="<?= $selected['author'] ?>">
                </div>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title" required value="<?= $selected['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea class="form-control" name="content" rows="15" cols="33" required ><?= $selected['content'] ?></textarea>
                </div>
                <button class="btn btn-info" type="submit" name="publish">Publier</button>
                <p><?= $errorMsg ?></p>
                <p><strong><?= $publishMessage ?></strong></p>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
        <div class="row row-title">
            <div class="col-3"></div>
            <div class="col-6">
                <h2>Modifier ou supprimer une news existante</h2>
            </div>
            <div class="col-3"></div>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Date de création</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Titre</th>
                        <th scope="col" class="icon">Modifier</th>
                        <th scope="col" class="icon">Supprimer</th>
                    </tr>
                </thead>
                <tbody><?php
                    foreach($newsList as $news)
                    {?>
                        <tr>
                            <th scope="row"><?= $news->getCreationDate()->format('d/m/Y') ?></th>
                            <td><?= $news->getAuthor() ?></td>
                            <td><?= $news->getTitle() ?></td>
                            <td class="icon"><a href="index.php?action=newsAdmin&modifiedId=<?= $news->getId() ?>"><img class="icon" src="./public/icons/pencil.svg" alt="Black Pencil icon"></a></td>
                            <td class="icon"><a href="index.php?action=deleteNewsView&id=<?=$news->getId() ?>"><img name="delete" type="submit" class="icon" src="./public/icons/delete.svg" alt="Black deleting cross"></a></td>
                        </tr>
                    <?php
                    }?>
                    
                </tbody>

            </table>
    </div>
</div>