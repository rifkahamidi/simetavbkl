<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datakab".
 *
 * @property int $kdkab
 * @property string $nmkab
 */
class Datakab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datakab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kdkab', 'nmkab'], 'required'],
            [['kdkab'], 'integer'],
            [['nmkab'], 'string', 'max' => 50],
            [['kdkab'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kdkab' => 'Kdkab',
            'nmkab' => 'Nmkab',
        ];
    }

    public function actionGetNmkab($kdkab)
    {
        $nmkab = Datakab::find()->select('nmkab')->where(['kdkab' => $kdkab])->scalar();
        
        if ($nmkab) {
            return $nmkab; // Kembalikan nama kabupaten
        } else {
            return null; // Jika tidak ditemukan, kembalikan null
        }
    }

}
