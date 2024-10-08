<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\Survei $model */

$this->title = 'Buat Survei';
?>
<div class="survei-create text-center"> <!-- Menambahkan kelas text-center -->

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>
