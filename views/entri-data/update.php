<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\EntriData $model */

$this->title = 'Update Entri Data: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entri Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entri-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
