<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\easyii\modules\catalog\api\Catalog;

$this->title = $cat->seo('title', $cat->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = $cat->model->title;
?>

<style>
.list-group {
list-style: none;
}
.o-catalog {
  width: 60%;
  float: right;
  color: #71777a;
}
.o-categoryList a {
  color: #71777a;
}
.list-group-collapse {
  padding-left: 10px;
}
.list-group-collapse a {
  color: #e5803a;
}
</style>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="o-categoryList">
        <h1 class="o-categoryList_ttl"><?= $cat->model->title ?></h1>

        <div class="row">
          <div class="col-md-8 col-xs-12 pull-right">
            <?php if(count($items)) : ?>
              <?php foreach($items as $item) { ?>
                <?= $this->render('_item', ['item' => $item, 'category' => $cat]) ?>
              <?php }
            else : ?>
                <p>Kategorija trenutno ne sadrži niti jedan proizvod.</p>
            <?php endif; ?>
          </div>

          <div class="col-md-4 col-xs-12 pull-left">
      	    <div class="col-12">
              <a class="btn btn-default" data-toggle="collapse" href="#collapseE" role="button" aria-expanded="false" aria-controls="collapseExample">Filter</a>
      	    </div>
      	    <div class="col-12 well well-sm collapse" id="collapseE">
              <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['/shop/cat', 'slug' => $cat->slug])]); ?>
                <?= $form->field($filterForm, 'priceFrom') ?>
                <?= $form->field($filterForm, 'priceTo') ?>
                <?php //$form->field($filterForm, 'storageFrom') ?>
                <?php // $form->field($filterForm, 'storageTo') ?>
                <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
              <?php ActiveForm::end(); ?>
      	    </div>
            <hr>
            <?php function renderNode($node, $initialImage = true){
              if(!count($node->children)){
                $html = '<li class="list-item">';
                $html .= Html::a($node->title, ['/shop/cat', 'slug' => $node->slug]) . '</li>';
              } else {
                $html = '<li class="list-item">';
                $html .= '<a href="#' . $node->slug . '" class="" data-toggle="collapse">' . $node->title . '<span class="pull-right">↓</span></a>';
                $html .= '<ul class="list-group list-group-collapse collapse" id="' . $node->slug . '">';
                foreach($node->children as $child){$html .= renderNode($child, false);}
                $html .= '</ul></li>';
              }

              return $html;
            } ?>

            <div class="o-catalog pull-left">
          	  <ul class="list-group">
                <?php foreach(Catalog::tree() as $node) echo renderNode($node); ?>
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <?= $cat->pages() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
