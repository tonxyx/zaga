<?php

use yii\easyii\modules\carousel\api\Carousel;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use yii\helpers\Url;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>

<?= Carousel::widget(1140, 520) ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">
      <h1><?= Text::get('index-welcome-title') ?></h1>
      <p><?= $page->text ?></p>
    </div>

    <section class="col-sm-12">
      <h2>Novosti</h2>

      <div class="o-novelty_wrap">
        <div class="row">
          <?php foreach (News::last(3) as $news) { ?>
            <div class="col-sm-4">
              <a class="o-novelty_link" href="<?php echo Url::to(['/news/view', 'slug' => $news->slug]); ?>">
                <article class="o-novelty">
                  <h2 class="o-novelty_title"><strong><?php echo $news->title; ?></strong></h2>

                  <?php if ($news->image) { ?>
                    <img class="o-novelty_img" src="<?php echo $news->image; ?>">
                  <?php } ?>

                  <div class="o-novelty_text">
                    <?php echo $news->short ?>
                  </div>
                </article>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>

    </section>
  </div>
</div>

<br>
<hr>
<br>
