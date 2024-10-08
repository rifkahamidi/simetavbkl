<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survei".
 *
 * @property int $kdsurvei
 * @property int $id_survei
 * @property string $nmsurvei
 * @property string $tipe
 * @property string $unit_stat
 * @property string $ker_wil
 * @property string $jenis
 * @property string $deskripsi
 * @property string $status
 */
class Survei extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survei';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kdsurvei', 'id_survei', 'nmsurvei', 'tipe', 'unit_stat', 'ker_wil', 'deskripsi', 'status'], 'required'],
            [['kdsurvei', 'id_survei'], 'integer'],
            [['nmsurvei', 'tipe', 'unit_stat', 'ker_wil', 'jenis', 'deskripsi', 'status'], 'string', 'max' => 255],
            [['id_survei'], 'unique'],
            [['kdsurvei'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kdsurvei' => 'Kdsurvei',
            'id_survei' => 'Id Survei',
            'nmsurvei' => 'Nmsurvei',
            'tipe' => 'Tipe',
            'unit_stat' => 'Unit Stat',
            'ker_wil' => 'Ker Wil',
            // 'jenis' => 'Jenis',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
        ];
    }
}
