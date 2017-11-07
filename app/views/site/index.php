<?php

use yii\easyii\modules\carousel\api\Carousel;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\easyii\modules\catalog\api\ItemObject;
use yii\easyii\modules\catalog\api\PhotoObject;
use yii\helpers\Html;
use yii\helpers\Url;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>

<?= Carousel::widget(1140, 520) ?>

<div class="o-welcome">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1 class="o-welcome_title"><?= Text::get('index-welcome-title') ?></h1>
        <div class="o-welcome_text"><?= $page->text ?></div>
      </div>
    </div>
  </div>
</div>

<div class="o-novelty_sectionWrap">
  <section class="container">
    <div class="row">
      <?php if (count($itemsOnDiscount)) { ?>
        <div class="col-sm-12">
          <h2>Akcije</h2>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php $init = 1; foreach ($itemsOnDiscount as $key => $value) {
                $item = new ItemObject($value) ?>
                <div class="item <?php echo $init ?' active' : ''; $init = 0; ?>">
                  <img src="<?php echo $item->thumb(1280, 600); ?>" alt="<?php echo $item->title; ?>">
                  <div class="carousel-caption">
                    <h3><?php echo $item->title; ?></h3>
                    <p>
                      <del class="small">
                        <?php echo number_format($item->oldPrice, 2, ',', '.'); ?> HRK
                      </del>
                      <?php echo number_format($item->price, 2, ',', '.'); ?> HRK
                    </p>
                  </div>
                </div>
              <?php } ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div>
      <?php } ?>

      <div class="col-sm-12">
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
      </div>
    </div>
  </section>
</div>
