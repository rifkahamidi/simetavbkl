<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * Finds user by sobat_ID
     *
     * @param int $sobat_ID
     * @return static|null
     */
    public static function findBySobatID($sobat_ID)
    {
        return static::findOne(['sobat_ID' => $sobat_ID]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Implement sesuai kebutuhan jika menggunakan token untuk autentikasi
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // Jika menggunakan autentikasi berbasis cookie, tambahkan kolom authKey di tabel pengguna
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // Implementasikan validasi authKey jika diperlukan
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        // return Yii::$app->security->validatePassword($password, $this->password);
    }
}
