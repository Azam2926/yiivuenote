<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Notes
 * @package micro\models
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $body
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */

class Notes extends ActiveRecord
{
    public static function tableName()
    {
        return '{{notes}}';
    }
}