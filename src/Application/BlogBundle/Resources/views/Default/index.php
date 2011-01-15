<?php if (!count($articles)): ?>
ブログねーよ
<?php else: ?>
<?php foreach ($articles as $article): ?>
ブログ名：<?php echo $article->getName() ?><br />
本文：<?php echo nl2br($article->getBody()) ?><br />
<hr />
<?php endforeach ?>
<?php endif ?>

ブログ作成は<a href="<?php echo $view['router']->generate('blog_new') ?>">こっち</a>
