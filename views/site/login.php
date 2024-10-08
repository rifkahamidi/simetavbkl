<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>

<div class="card border-light-subtle shadow-sm">
    <div class="row g-0">
        <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
            <div class="d-flex align-items-center">
                <img class="img-fluid rounded-start object-fit-contain me-2" style="width: 80px; height: 80px;" loading="lazy" src="../web/bps.png" alt="BootstrapBrain Logo">
                <h1 class="mb-0" style="font-weight: bold;">SIMETA</h1>
            </div>
            <h3>SISTEM INFORMASI MONITORING <br> ENTRI DATA MITRA</h3>
        </div>

        <div class="col-12 col-md-6">
            <div class="card-body p-3 p-md-4 p-xl-5">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form'],
                    'method' => 'post',
                    'action' => ['site/login'],
                ]); ?>

                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <?= $form->field($model, 'sobat_ID', [
                            'template' => '<label for="{id}" class="form-label">{label} <span class="text-danger">*</span></label>{input}{error}',
                        ]) ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'email', [
                            'template' => '<label for="{id}" class="form-label">{label} <span class="text-danger">*</span></label>{input}{error}',
                            'inputOptions' => ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'EMAIL'],
                        ]) ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'id' => 'remember_me',
                            'class' => 'form-check-input',
                        ], '<label class="form-check-label text-secondary" for="{id}">{label}</label>') ?>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <?= Html::submitButton('Log in now', ['class' => 'btn bsb-btn-xl btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="row">
                    <div class="col-12">
                        <hr class="mt-5 mb-4 border-secondary-subtle">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
