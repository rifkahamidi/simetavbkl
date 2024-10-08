<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\EntriData $model */

$this->title = 'Create Entri Data';
$this->params['breadcrumbs'][] = ['label' => 'Entri Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entri-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
