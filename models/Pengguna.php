<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property int $id
 * @property int $sobat_ID
 * @property int $kdkab
 * @property string $satker
 * @property string $nama
 * @property string $jk
 * @property string $email
 * @property string $posisi
 * @property int $role
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sobat_ID', 'kdkab', 'satker', 'nama', 'jk', 'email', 'posisi', 'role'], 'required'],
            [['id', 'sobat_ID', 'kdkab', 'role'], 'integer'],
            [['satker', 'nama', 'email', 'posisi'], 'string', 'max' => 255],
            [['jk'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sobat_ID' => 'Sobat ID',
            'kdkab' => 'Kdkab',
            'satker' => 'Satker',
            'nama' => 'Nama',
            'jk' => 'Jk',
            'email' => 'Email',
            'posisi' => 'Posisi',
            'role' => 'Role',
        ];
    }
}
