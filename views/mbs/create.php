<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\Mbs $model */

$this->title = 'MUATAN BLOK SENSUS';

?>
<style>
    .centered-title {
        text-align: center;
        margin-top: 20px;
    }
</style>
<div class="mbs-create">

<h1 class="centered-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    

</div>
