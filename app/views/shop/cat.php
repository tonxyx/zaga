<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $cat->seo('title', $cat->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = $cat->model->title;
?>
<h1><?= $cat->model->title ?></h1>
<br/>

<div class="row">
    <div class="col-md-8">
        <?php if(count($items)) : ?>
          <br/>
          <?php foreach($items as $item) { ?>
            <?= $this->render('_item', ['item' => $item, 'category' => $cat]) ?>
      		<?php }
        else : ?>
            <p>Kategorija trenutno ne sadrži niti jedan proizvod.</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h4>Filter</h4>
        <div class="well well-sm">
          <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['/shop/cat', 'slug' => $cat->slug])]); ?>
            <?= $form->field($filterForm, 'priceFrom') ?>
            <?= $form->field($filterForm, 'priceTo') ?>
            <?= $form->field($filterForm, 'storageFrom') ?>
            <?= $form->field($filterForm, 'storageTo') ?>
            <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
          <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



<?= $cat->pages() ?>
