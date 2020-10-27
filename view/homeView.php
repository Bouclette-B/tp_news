<div class="container">
    <div class="row row-title">
        <div class="col-3"></div>
        <div class="col-6">
            <h2>Les news</h2>
        </div>
        <div class="col-3"></div>
    </div>
            <?php foreach($newsList as $news){?>
                <div class="row row-news">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h3><?= $news->getTitle() ?></h3>
                        <?php include('./include/newsInfo.php') ?>
                        <p><?= $news->getExcerpt()?>
                        <a href="index.php?action=newsView&id=<?= $news->getId() ?>"><em>Lire la suite</em></a>
                    </div>
                    <div class="col-3"></div>
                </div>
            <?php } ?>
</div>
