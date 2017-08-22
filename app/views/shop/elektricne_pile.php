<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::img($item->thumb(100, 160)) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]); ?></p>
        <p>
            <span class="text-muted">Nazivni napon ( V ):</span> <?= $item->data->{'nazivni-napon-v'} ?>
            <br/>
	    <span class="text-muted">Potrošnja energije kW</span> <?php echo $item->data->{'potrosnja-energije-kw'} ?>
            <br/>
            <span class="text-muted">Težina ( kg ):</span> <?= $item->data->{'tezina-kg'} ?>
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
