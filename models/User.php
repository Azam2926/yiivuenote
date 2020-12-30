<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $access_token
 * @property string $avatar
 * @property integer $account_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return '{{users}}';
    }
    
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getAuthKey()
    {
        return null;
    }
    
    public function validateAuthKey($authKey)
    {
        return false;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function uploadAvatar()
    {
        if ($this->validate('file'))
        {
            $path = \Yii::getAlias('@webroot/uploads/images/profiles/');
            if ($this->avatar)
                unlink($path . $this->avatar);
            
            $this->avatar = $this->file->baseName . '.' . $this->file->getExtension();
            
            if (!file_exists($path))
                mkdir($path, 0777, true);
            
            $this->file->saveAs($path . $this->avatar);
            return $this->save();
        }
        
        return false;
    }
}