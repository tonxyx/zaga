<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\file\api\File;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-shop');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = 'Katalog';

function renderNode($node){
    if(!count($node->children)){
        $html = '<li class="list-group-item">'.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug]).'</li>';
    } else {
        $html = '<li class="list-group-item">'.$node->title.'</li>';
        $html .= '<ul class="list-group">';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>


<div class="row">
    <div class="col-md-8">
        <ul class="list-group">
            <?php foreach(Catalog::tree() as $node) echo renderNode($node); ?>
        </ul>
    </div>
    <div class="col-md-4">
        <?= $this->render('_search_form', ['text' => '']) ?>

        <h4>Najnoviji proizvodi</h4>
        <?php foreach(Catalog::last(10) as $item) : ?>
            <p>
                <?= Html::img($item->thumb(30)) ?>
                <?= Html::a($item->title, ['/shop/view', 'slug' => $item->slug]) ?><br/>
                <span class="label label-warning"><?php echo number_format($item->price, 2, ',', '.'); ?> HRK</span>
            </p>
        <?php endforeach; ?>
    </div>
</div>
