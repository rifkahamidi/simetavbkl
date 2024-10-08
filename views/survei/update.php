<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\Survei $model */

$this->title = 'Update Survei: ' . $model->deskripsi;
$this->params['breadcrumbs'][] = ['label' => 'Surveis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kdsurvei, 'url' => ['view', 'kdsurvei' => $model->kdsurvei]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="survei-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
