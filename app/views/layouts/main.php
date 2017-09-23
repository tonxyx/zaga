<?php
use yii\easyii\modules\shopcart\api\Shopcart;
use yii\easyii\modules\subscribe\api\Subscribe;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

$asset = \app\assets\AppAsset::register($this);
$goodsCount = count(Shopcart::goods());

$this->beginContent('@app/views/layouts/base.php'); ?>

<div id="wrapper" class="container">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Url::home() ?>">
                      <img src="<?= $asset->baseUrl ?>/logo.png" height="180%"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?= Menu::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'items' => [
                            ['label' => 'Naslovna', 'url' => ['site/index']],
                            ['label' => 'Katalog', 'url' => ['shop/index']],
                            ['label' => 'Novosti', 'url' => ['news/index']],
                            // ['label' => 'Galerija', 'url' => ['gallery/index']],
                            ['label' => 'Kontakt', 'url' => ['/contact/index']],
                        ],
                    ]); ?>
                    <a href="<?= Url::to(['/shopcart']) ?>" class="btn btn-default navbar-btn navbar-right" title="Pošalji upit">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <?php if($goodsCount > 0) { ?>
                            <?= $goodsCount ?> <?= $goodsCount > 1 ? 'proizvoda' : 'proizvod' ?> - <?php echo number_format(Shopcart::cost(), 2, ',', '.'); ?> HRK
                        <?php } ?>
                    </a>

                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php /* if($this->context->id != 'site') : ?>
            <br/>
            <?php echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])?>
        <?php endif; */ ?>
        <?= $content ?>
        <div class="push"></div>
    </main>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"><img src="<?= $asset->baseUrl ?>/logo.png" /></div>
        <p>Porijeklo kapitala  100% domaći kapital - izvor FINA (domaći kapital - izvor DZS) 20.000 Kn uplaćen u cijelosti.
          Direktor i član uprave društva je Matija Rački zastupa društvo pojedinačno i samostalno.</p>
        <p><i class="fa fa-map-pin"></i> Zagrebačka 18, 51500 Krk</p>
        <p><i class="fa fa-phone"></i> Tel.: ‎+385 51 220 330</p>
        <p><i class="fa fa-envelope"></i> E-mail: info@zaga-racki.hr</p>

      </div>
      <div class="col-md-4 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">Ostale informacije</h6>
        <ul class="footer-ul">
          <li>OIB: 71162092072</li>
          <li>Trgovački sud u Rijeci</li>
          <li>Godina osnivanja: 2002</li>
          <li>Registracijski broj: 040173519</li>
          <li>Registracijski broj: 040173519</li>
          <li>Poslovna banka: PBZ HR4023400091110078470</li>
          <li>BIC/SWIFT: PBZGHR2X</li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-12 paddingtop-bottom">
        <div class="col-md-12" style="margin-bottom: 150px"><img src="<?= $asset->baseUrl ?>/logos_banner.png" width="100%"/></div>

        <div class="col-md-12 top">
          Prijava na newsletter
        </div>
        <div class="col-md-12">
          <?php if(Yii::$app->request->get(Subscribe::SENT_VAR)) : ?>
            Uspješno ste se prijavili
          <?php else : ?>
            <?= Subscribe::form() ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer end here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-11">
      <p>© 2017 - zaga-racki.hr</p>
    </div>
    <div class="col-md-1">
      <p><a href="https://www.facebook.com/zagakrk">Facebook</a></p>
    </div>
  </div>
</div>

<!-- <footer>
  <div class="container footer-content">
    <div class="row">
      <div class="col-md-2">
        Prijava na newsletter
      </div>
      <div class="col-md-10">
        <?php if(Yii::$app->request->get(Subscribe::SENT_VAR)) : ?>
          Uspješno ste se prijavili
        <?php else : ?>
          <?= Subscribe::form() ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-sm-12">
      <ul class="list-unstyled clear-margins">

      </ul>
    </div>
    <div class="col-md-12 text-right">
      ©2017 zaga-racki.hr
    </div>
  </div>
</footer> -->
<?php $this->endContent(); ?>
