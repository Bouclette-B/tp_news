<div class="container">
    <div class="row row-form">
        <div class="col-3"></div>
        <form action="" class="col-6" method="post">
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" class="form-control" name="author" required>
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea class="form-control" name="content" rowd="5" cols="33" required></textarea>
            </div>
            <button class="btn btn-success" type="submit" name="publish">Publier</button>
        </form>
    </div>
    <?php
    if($newsIsPublished)
    {
        ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $newsIsPublished ?>
            </div>
            <div class="col-3"></div>
        </div>
        <?php
    } ?>
</div>