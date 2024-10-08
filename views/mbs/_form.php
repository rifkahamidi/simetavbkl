<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use kartik\select2\Select2;
use kartik\select2\Select2Asset;
use yii\helpers\ArrayHelper;
use app\models\Mbs;

JqueryAsset::register($this);
Select2Asset::register($this);

/** @var yii\web\View $this */
/** @var app\Models\Mbs $model */
/** @var yii\widgets\ActiveForm $form */

// Fetch data from the Mbs table
$dataId = Mbs::find()->select(['idbs', 'idbs AS name'])->asArray()->all();
$dataProv = Mbs::find()->select(['kdprov', 'idbs AS name'])->asArray()->all();

$this->registerJs("
    $('#" . Html::getInputId($model, 'idbs') . "').on('input', function() {
        var idbs = $(this).val();
        if (idbs.length >= 12) {
            $.ajax({
                url: '" . Url::to(['mbs/get-details']) . "',
                type: 'GET',
                data: {idbs: idbs},
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#" . Html::getInputId($model, 'kdprov') . "').val(data.kdprov);
                        $('#" . Html::getInputId($model, 'kdkab') . "').val(data.kdkab);
                        $('#" . Html::getInputId($model, 'kdkec') . "').val(data.kdkec);
                        $('#" . Html::getInputId($model, 'kddes') . "').val(data.kddes);
                        $('#" . Html::getInputId($model, 'kdbs') . "').val(data.kdbs);
                    }
                }
            });
        } else {
            // Clear fields if idbs length is insufficient
            $('#" . Html::getInputId($model, 'kdprov') . "').val('');
            $('#" . Html::getInputId($model, 'kdkab') . "').val('');
            $('#" . Html::getInputId($model, 'kdkec') . "').val('');
            $('#" . Html::getInputId($model, 'kddes') . "').val('');
            $('#" . Html::getInputId($model, 'kdbs') . "').val('');
        }
    });
");

?>

<div class="container"> 
    <div class="col-lg-6">
        <div class="form">
            <div class="card">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model) ?>

                    <div class="row mb-6">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'status')->dropDownList(
                                [
                                    '1' => '1-Ganti Kode',
                                    '2' => '2-Berubah Muatan',
                                    '3' => '3-Pecah BS (akibat pemekaran desa)',
                                    '4' => '4-Gabung BS',
                                    '5' => '5-Berubah Jenis BS',
                                ], 
                                ['class' => 'form-control', 'prompt' => 'Pilih Status Perubahan Blok Sensus']
                            )->label('Status Perubahan') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'idbs')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($dataId, 'idbs', 'name'),
                                'options' => ['placeholder' => 'Pilih Id BS'],
                                'pluginOptions' => ['allowClear' => true],
                            ])->label('Id BS') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'tipe')->textInput([
                                'readonly' => true,   
                                'value' => 'BS2020'
                            ])->label('Tipe') ?>
                        </div>
                    </div>

                    <?php
                    // Field groups for location details
                    $fields = [
                        ['kdprov', 'Kode Prov'],
                        ['kdkab', 'Kode Kabupaten'],
                        ['kdkec', 'Kecamatan'],
                        ['kddes', 'Kelurahan'],
                        ['kdbs', 'Kode BS'],
                    ];

                    foreach ($fields as [$attribute, $label]) {
                        echo $form->field($model, $attribute)->textInput(['id' => 'input' . ucfirst($attribute), 'class' => 'form-control'])->label($label);
                    }
                    ?>

                    <div class="row mb-3">
                        <?= $form->field($model, 'khusus')->dropDownList(
                            ['0' => 'Tidak', '1' => 'Ya']
                        )->label('BS Khusus') ?>
                    </div>
                    <div class="row mb-3">
                        <?= $form->field($model, 'tingkat')->dropDownList(
                            ['0' => 'Tidak', '1' => 'Ya']
                        )->label('Bangunan Bertingkat') ?>
                    </div>
                    <?= $form->field($model, 'nm_gedung')->textInput(['id' => 'inputNmGedung', 'class' => 'form-control'])->label('Nama Gedung') ?>
                    <?= $form->field($model, 'j_keluarga')->textInput(['id' => 'inputJKeluarga', 'class' => 'form-control'])->label('Jumlah Keluarga') ?>
                    <?= $form->field($model, 'bstt')->textInput(['id' => 'inputBstt', 'class' => 'form-control'])->label('Jumlah BSTT') ?>
                    <?= $form->field($model, 'bsbtt')->textInput(['id' => 'inputBsbtt', 'class' => 'form-control'])->label('Jumlah BSBTT') ?>
                    <?= $form->field($model, 'bstt_k')->textInput(['id' => 'inputBsttK', 'class' => 'form-control'])->label('Jumlah BSTTK') ?>
                    <?= $form->field($model, 'bskeko')->textInput(['id' => 'inputBskeko', 'class' => 'form-control'])->label('Jumlah Bangunan Khusus Usaha') ?>
                    <?= $form->field($model, 'j_ruta_biasa')->textInput(['id' => 'inputJRutaBiasa', 'class' => 'form-control'])->label('Jumlah Ruta Biasa') ?>
                    <?= $form->field($model, 'j_ruta_khusus')->textInput(['id' => 'inputJRutaKhusus', 'class' => 'form-control'])->label('Jumlah Ruta Khusus') ?>
                    <?= $form->field($model, 'j_art_l')->textInput(['id' => 'inputJARTL', 'class' => 'form-control'])->label('Jumlah ART Laki-laki') ?>
                    <?= $form->field($model, 'j_art_p')->textInput(['id' => 'inputJARTP', 'class' => 'form-control'])->label('Jumlah ART Perempuan') ?>

                    <div class="row mb-3">
                        <?= $form->field($model, 'dominan')->dropDownList(
                            [
                                '1' => '1-Pemukiman Biasa',
                                '2' => '2-Pemukiman Mewah/Elite/Real Estate',
                                '3' => '3-Pemukiman Kumuh',
                                '4' => '4-Apartemen/Kondominium/Flat',
                                '5' => '5-Kos-kosan/Kontrakan',
                                '6' => '6-Pesantren/Barak/Asrama/Sekolah',
                                '7' => '7-Pertokoan/Pasar/Perkantoran',
                                '8' => '8-Pusat Perbelanjaan Modern/Mall',
                                '9' => '9-Kawasan Industri/Sentra Industri',
                                '10' => '10-Hotel atau tempat rekreasi',
                                '11' => '11-Lainnya (Hutan/Kebun, Pulau kosong, Danau/waduk/rawa, Lahan kosong)',
                            ],
                            ['class' => 'form-control', 'prompt' => 'Pilih Jenis Muatan Dominan']
                        )->label('Muatan Dominan') ?>
                    </div>

                    <div class="row mb-3">
                        <?= $form->field($model, 'jenisbs')->dropDownList(
                            [
                                'Biasa' => 'Biasa',
                                'Khusus' => 'Khusus',
                                'Persiapan' => 'Persiapan'
                            ],
                            ['class' => 'form-control', 'prompt' => 'Pilih Jenis BS']
                        )->label('Jenis BS') ?>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <?= Html::submitButton('Submit Form', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
