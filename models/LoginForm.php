<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 */
class LoginForm extends Model
{
    public $sobat_ID;
    public $email;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['sobat_ID', 'email'], 'required'],  // 'id' dan 'email' diperlukan
            ['email', 'email'],              // Validasi format email
            ['rememberMe', 'boolean'],       // 'rememberMe' harus berupa boolean
        ];
    }

    /**
     * Logs in a user using the provided id and email.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user !== null) {
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            }
        }
        return false;
    }

    /**
     * Finds user by [[id]] and [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne(['sobat_ID' => $this->sobat_ID, 'email' => $this->email]);
        }

        return $this->_user;
    }
}
?>