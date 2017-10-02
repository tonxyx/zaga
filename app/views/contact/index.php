<?php

use yii\easyii\modules\feedback\api\Feedback;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-contact');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;
?>

<div class="o-contactPage">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="m-0"><?= $page->seo('h1', $page->title) ?></h1>
      </div>

      <div class="col-md-6 mt-3">
        <?= $page->text ?>
      </div>
      <div class="col-md-6">
        <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
          <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Poruka uspješno poslana.</h4>
        <?php else : ?>
          <div class="well well-sm mt-3">
            <?= Feedback::form() ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2819.717670098291!2d14.565357215511101!3d45.03065647909822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4763720971d76ca7%3A0x660328e73e5eb53e!2s%C5%BDaga+D.o.o!5e0!3m2!1sen!2sno!4v1506953851223" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.4019806587876!2d15.223103115518914!3d45.25988437909904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476473f41519f2ef%3A0x4a6de6e333a37c1!2sCRAFTS+FOR+REPAIR+OF+MOTOR+SAWS+AND+COMMERCIAL+CRAFTS+MATIJA+RA%C4%8CKI!5e0!3m2!1sen!2sno!4v1506954750050" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
