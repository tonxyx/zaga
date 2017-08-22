<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::img($item->thumb(100, 160)) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
        <p>
            <span class="text-muted">Općenito:</span> <?= $item->data->opcenito ?>
            <br/>
            <span class="text-muted">Obujam:</span> <?= $item->data->obujam ?>
            <br/>
            <span class="text-muted">Snaga:</span> <?= $item->data->snaga ?>
	    <br/> 
            <span class="text-muted">Težina:</span> <?= $item->data->tezina ?>
	    <br/>
            <?php if(!empty($item->data->features) ) : ?>
                <span class="text-muted">Ostalo:</span> <?= implode(', ', $item->data->features) ?>
            <?php endif; ?>
        </p>
        <h3>
            <?php if($item->discount) : ?>
                <del class="small"><?= $item->oldPrice ?></del>
            <?php endif; ?>
            <?= $item->price ?> HRK
        </h3>
    </div>
</div>
<br>
