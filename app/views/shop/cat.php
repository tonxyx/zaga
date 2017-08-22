<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $cat->seo('title', $cat->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = $cat->model->title;
?>
<h1><?= $cat->model->title ?></h1>
<br/>

<div class="row">
    <div class="col-md-8">
        <?php if(count($items)) : ?>
            <br/>
<?php switch ($cat->slug) {
case 'motorne-pile':
	$view = 'motorne_pile';
	break;
case 'elektricne-pile':
	$view = 'elektricne_pile';
	break;
case 'akumulatorske-pile':
	$view = 'akumulatorske_pile';
	break;
case 'motorne-kose':
	$view = 'motorne_kose';
	break;
default:
	$view = '_item';
	break;
}
		foreach($items as $item) { ?>
                    <?= $this->render($view, ['item' => $item]) ?>
		<?php } ?>
        <?php else : ?>
            <p>Category is empty</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h4>Filters</h4>
        <div class="well well-sm">
            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => Url::to(['/shop/cat', 'slug' => $cat->slug])]); ?>
                <?= $form->field($filterForm, 'brand')->dropDownList($cat->fieldOptions('brand', 'Select brand')) ?>
                <?= $form->field($filterForm, 'priceFrom') ?>
                <?= $form->field($filterForm, 'priceTo') ?>
                <?= $form->field($filterForm, 'touchscreen')->checkbox() ?>
                <?= $form->field($filterForm, 'storageFrom') ?>
                <?= $form->field($filterForm, 'storageTo') ?>
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>



<?= $cat->pages() ?>
