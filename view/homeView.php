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
                        <h3><?= $news['title'] ?></h3>
                        <p><em>Écrit par <strong><?= $news['author'] ?></strong>, le <?= $news['creationDate'] ?></em></p>
                        <p><?= substr($news['content'], 0, 199) ?>...<p>
                        <a href="#"><em>Lire la suite</em></a>
                    </div>
                    <div class="col-3"></div>
                </div>
            <?php } ?>
</div>