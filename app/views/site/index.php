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

<style>
  .swiper-container {
    width: 100%;
    height: 100%;
  }
  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }
</style>

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
          <div class="swiper-container">

            <!-- Wrapper for slides -->
            <div class="swiper-wrapper">
              <?php foreach ($itemsOnDiscount as $key => $value) { $item = new ItemObject($value) ?>
                <div class="swiper-slide">
                  <img src="<?php echo $item->thumb(550, 300); ?>" alt="<?php echo $item->title; ?>">
                  <div style="position:absolute; padding: 2px; color: white; margin-top: 50px;
                      background-color: rgba(0,0,0,.65); border-radius: 2px;">
                    <h3><?php echo $item->title; ?></h3>
                    <h4>
                      <del class="small" style="color: rgba(255,255,255,.65)">
                        <?php echo number_format($item->oldPrice, 2, ',', '.'); ?>
                      </del>
                      <?php echo number_format($item->price, 2, ',', '.'); ?> HRK
                    </h4>
                    <?php echo isset($item->data->akcija) && $item->data->akcija ?
                      '</p>' . $item->data->akcija . '</p>' : '' ?>
                  </div>
                </div>
              <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <div class="swiper-pagination"></div>
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
