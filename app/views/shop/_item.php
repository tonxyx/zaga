<?php use yii\helpers\Html; ?>

<div class="o-categoryList_item">
  <div class="row">
    <div class="col-sm-3">
      <?= Html::img($item->image) ?>
    </div>
    <div class="col-sm-9">
      <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
      <p>
        <?php if (isset($category) && $category) {
          $counter = 0;
          foreach ($category->fields as $field) {
            if ($counter == 3) break;
            else if (isset($item->data->{$field->name}) && $item->data->{$field->name}) { ?>
              <?php if ($field->type != 'boolean') { ?>
                <span class="text-muted"><?php echo $field->title; ?>: </span>
                <?php if (is_array($item->data->{$field->name})) {
                  foreach ($item->data->{$field->name} as $key => $value) {
                    echo $value  . ', ';
                  }
                } else {
                  echo $item->data->{$field->name};
                }
              } else { ?>
                <span class="text-muted"><?php echo $field->title; ?></span>
              <?php } ?>
              <br>
            <?php } ?>
          <?php $counter++; }

          if(!empty($item->data->features)) { ?>
            <span class="text-muted">Ostalo:</span> <?php echo implode(', ', $item->data->features);
          }
        } ?>
      </p>
      <h3>
        <?php if($item->discount) { ?>
            <del class="small"><?php echo number_format($item->oldPrice, 2, ',', '.'); ?> HRK</del>
        <?php }
        echo number_format($item->price, 2, ',', '.'); ?> HRK
      </h3>
    </div>
  </div>
</div>
