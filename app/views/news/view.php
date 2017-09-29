<?php
use yii\easyii\modules\news\api\News;
use yii\helpers\Url;

$this->title = $news->seo('title', $news->model->title);
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['news/index']];
$this->params['breadcrumbs'][] = $news->model->title;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <div class="o-newsView">

        <h1 class="o-newsView_title"><?= $news->title; ?></h1>

        <hr class="c-hr">

        <?= $news->text ?>

        <?php if(count($news->photos)) : ?>
          <div class="o-gallery">
            <div class="row">

              <?php foreach($news->photos as $photo) : ?>
                <div class="col-xs-3 col-md-2">
                  <div class="o-novelty">
                    <?= $photo->box(200, 200) ?>
                  </div>
                </div>
              <?php endforeach;?>

              <div class="col-sm-12">
                <?php News::plugin() ?>
              </div>

            </div>
          </div>
        <?php endif; ?>

        <div class="mb-4">
          <?php foreach($news->tags as $tag) : ?>
              <a href="<?= Url::to(['/news', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
          <?php endforeach; ?>
        </div>

        <div class="small-muted">Broj pregleda: <?= $news->views ?></div>

      </div>

    </div>
  </div>
</div>
