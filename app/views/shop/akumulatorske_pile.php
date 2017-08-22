<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::img($item->thumb(100, 160)) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
        <p>
            <span class="text-muted">Težina kg:</span> <?= $item->data->{'tezina-kg'} ?>
            <br/>
	    <span class="text-muted">Razina zvučnog tlaka dB:</span> <?= $item->data->{'razina-zvucnog-tlaka-db-a'} ?>
            <br/>
            <span class="text-muted">Razina zvučne snage dB:</span> <?= $item->data->{'razina-zvucne-snage-db'} ?>
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
