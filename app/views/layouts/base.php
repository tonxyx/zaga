<?php

use yii\helpers\Html;

$asset = \app\assets\AppAsset::register($this);

$this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo Html::encode($this->title); ?></title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?php echo $asset->baseUrl; ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $asset->baseUrl; ?>/favicon.ico" type="image/x-icon">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody();
        echo $content;
        $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage() ?>
