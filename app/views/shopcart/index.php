<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\shopcart\api\Shopcart;
use yii\helpers\Html;
use yii\helpers\Url;

$page = Page::get('page-shopcart');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;
?>
<h1><?= $page->seo('h1', $page->title) ?></h1>

<br/>

<?php if(count($goods)) : ?>
    <div class="row">
        <div class="col-md-8">
            <?= Html::beginForm(['/shopcart/update'])?>
            <table class="table" style="table-layout: fixed">
                <thead>
                <tr>
                    <th>Proizvod</th>
                    <th width="100">Količina</th>
                    <th width="120">Cijena kom.</th>
                    <th width="150">Ukupno</th>
                    <th width="30"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($goods as $good) : ?>
                    <tr>
                        <td>
                            <?= Html::a($good->item->title, ['/shop/view', 'slug' => $good->item->slug]) ?>
                            <?= $good->options ? "($good->options)" : '' ?>
                        </td>
                        <td><?= Html::textInput("Good[$good->id]", $good->count, ['class' => 'form-control input-sm']) ?></td>
                        <td>
                            <?php if($good->discount) : ?>
                                <del class="text-muted "><small><?php echo number_format($good->item->oldPrice, 2, ',', '.'); ?> HRK</small></del>
                            <?php endif; ?>
                            <?php echo number_format($good->price, 2, ',', '.'); ?> HRK
                        </td>
                        <td><?php echo number_format($good->price * $good->count, 2, ',', '.'); ?> HRK</td>
                        <th><?= Html::a('<i class="glyphicon glyphicon-trash text-danger"></i>', ['/shopcart/remove', 'id' => $good->id], ['title' => 'Ukloni proizvod']) ?></th>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" class="text-right">
                      <h3>Ukupno: <?php echo number_format(Shopcart::cost(), 2, ',', '.'); ?> HRK</h3>
                    </td>
                </tr>
                </tbody>
            </table>
            <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Ažuriraj', ['class' => 'btn btn-default pull-right']) ?>
            <?= Html::endForm()?>
        </div>
        <div class="col-md-4">
            <h4>Pošalji upit</h4>
            <div class="well well">
              <?= Shopcart::form(['successUrl' => Url::to('/shopcart/success')])?>
            </div>
        </div>
    </div>
<?php else : ?>
    <p>Lista upita je prazna.</p>
<?php endif; ?>
