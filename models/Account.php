<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $language
 * @property string $timezone
 * @property string $avatar
 * @property string $ip
 * @property string $device
 * @property string $location
 * @property string $last_activity
 * @property integer $created_at
 * @property integer $updated_at
*/

class Account extends ActiveRecord
{
    public static function tableName()
    {
        return '{{accounts}}';
    }
}