<?php
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\carousel\api\Carousel;
use yii\easyii\modules\gallery\api\Gallery;
use yii\easyii\modules\guestbook\api\Guestbook;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;

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
              <!-- TODO: add link to novelty -->
              <a class="o-novelty_link" href="#">
                <article class="o-novelty">
                  <h2 class="o-novelty_title"><strong><?php echo $news->title; ?></strong></h2>

                  <!-- TODO: add IF condition so we don't have img element without source if image isn't uploaded -->
                  <img class="o-novelty_img" src="<?php echo $news->image; ?>">

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
