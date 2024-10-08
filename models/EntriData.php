<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entri_data".
 *
 * @property int $id
 * @property string $kabkot
 * @property string $kec
 * @property string $kel
 * @property string $labelbs
 * @property string $idbs
 * @property string $jenis_bs
 * @property string $body
 */
class EntriData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entri_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kabkot', 'kec', 'kel', 'labelbs', 'idbs', 'jenis_bs', 'body'], 'required'],
            [['kabkot', 'kec', 'kel', 'labelbs', 'idbs', 'jenis_bs', 'body'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kabkot' => 'Kabkot',
            'kec' => 'Kec',
            'kel' => 'Kel',
            'labelbs' => 'Labelbs',
            'idbs' => 'Idbs',
            'jenis_bs' => 'Jenis Bs',
            'body' => 'Body',
        ];
    }
}
