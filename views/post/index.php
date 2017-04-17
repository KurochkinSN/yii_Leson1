<?php
//    echo '<pre>';
//    print_r($posts);
//    echo '</pre>';
//debugs($posts); // а это используем нашу функцию из func.phpкоторый прописан в web\index.php
?>

<?php if(!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <?php //Оформление взято с http://getbootstrap.com/components/#panels ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="<?=yii\helpers\Url::to(['post/view', 'id' => $post->id])?>"><?=$post->title?></a></h3>
            </div>
            <div class="panel-body">
                <?=$post->excerpt?>
            </div>
        </div>
    <?php endforeach; ?>
    <?=\yii\widgets\LinkPager::widget(['pagination' => $pages])?>
<?php endif; ?>
