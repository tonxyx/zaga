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

<div class="text-center">
    <h1><?= Text::get('index-welcome-title') ?></h1>
    <p><?= $page->text ?></p>
</div>

<br/>
<hr/>

<div class="text-center">
    <h2>Novosti</h2>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <?php foreach (News::last(3) as $news) { ?>
            <div class="col-sm-4">
              <?php echo Html::a($news->title, ['news/view', 'slug' => $news->slug]) ?>
              <br />
              <img src="<?php echo $news->image; ?>" height="150px" width="200px" />
              <br />
              <?php echo $news->short ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
</div>

<br/>
