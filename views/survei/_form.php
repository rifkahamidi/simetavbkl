<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Models\BuatSurvei $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="buat-survei-form">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row mb-3">
                        <label for="inputKdsurvei" class="col-sm-4 col-form-label">Kode Survei</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'kdsurvei')->textInput(['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputIdSurvei" class="col-sm-4 col-form-label">ID Survei</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'id_survei')->textInput(['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNmsurvei" class="col-sm-4 col-form-label">Nama Survei</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'nmsurvei')->textInput(['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputTipe" class="col-sm-4 col-form-label">Tipe</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'tipe')->textInput(['class' => 'form-control', 'value' => 'BS2020', 'readonly' => true])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputUnitStat" class="col-sm-4 col-form-label">Unit Statistik</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'unit_stat')->textInput(['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Kerangka Wilayah</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'ker_wil')->dropDownList([
                                'Berlangsung' => 'Blok Sensus',
                                'Selesai' => 'Satuan Lingkungan Sekitar',
                            ], [
                                'prompt' => 'Pilih Kerangka Wilayah',
                                'class' => 'form-select',
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDeskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'deskripsi')->textarea(['class' => 'form-control', 'style' => 'height: 100px'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'status')->dropDownList([
                                'Berlangsung' => 'Berlangsung',
                                'Selesai' => 'Selesai',
                            ], [
                                'prompt' => 'Pilih Status',
                                'class' => 'form-select',
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-8 offset-sm-4">
                            <?= Html::submitButton('Submit Form', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
