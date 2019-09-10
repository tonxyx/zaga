<?php
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-articles');

<div class="row">
	<div class="col-12>
$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;

function renderNode($node){
    if(!count($node->children)){
        $html = '<li class="list-group-item">'.Html::a($node->title, ['/articles/cat', 'slug' => $node->slug]).'</li>';
    } else {
        $html = '<li>'.$node->title.'</li>';
        $html .= '<ul class="list-group">';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>
<h1><?php //echo $page->seo('h1', $page->title); ?></h1>

<br/>
<ul>
    <?php foreach(Article::tree() as $node) echo renderNode($node); ?>
</ul>
</div></div>
