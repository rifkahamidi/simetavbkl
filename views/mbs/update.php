<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\Mbs $model */

$this->title = 'Update Mbs: ' . $model->idbs;
$this->params['breadcrumbs'][] = ['label' => 'Mbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbs, 'url' => ['view', 'idbs' => $model->idbs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mbs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
