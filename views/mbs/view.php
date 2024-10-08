<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\Models\Mbs $model */

$this->title = $model->idbs;
\yii\web\YiiAsset::register($this);
?>
<div class="mbs-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idbs',
            'tipe',
            'kdprov',
            'kdkab',
            'kdkec',
            'kddes',
            'kdbs',
            'j_keluarga',
            'bstt',
            'bsbtt',
            'bstt_k',
            'bskeko',
            'dominan',
            'tingkat',
            'nm_gedung',
            'j_ruta_biasa',
            'j_ruta_khusus',
            'j_art_l',
            'j_art_p',
        ],
    ]) ?>

</div>
