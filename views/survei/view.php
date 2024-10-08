<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\Models\Survei $model */

$this->title = $model->deskripsi;
// $this->params['breadcrumbs'][] = ['label' => 'Surveis', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="survei-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kdsurvei' => $model->kdsurvei], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kdsurvei' => $model->kdsurvei], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kdsurvei',
            'id_survei',
            'nmsurvei',
            'tipe',
            'unit_stat',
            'ker_wil',
            // 'jenis',
            'deskripsi',
            'status',
        ],
    ]) ?>

</div>
