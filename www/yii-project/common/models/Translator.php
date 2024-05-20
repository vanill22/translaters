<?php

namespace common\models;

use yii\db\ActiveRecord;
/**
 * Translator model
 *
 * @property integer $id
 * @property string $name
 * @property integer $available_weekdays
 * @property integer $available_weekends
 */
class Translator extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'translators';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['available_weekdays', 'available_weekends'], 'boolean'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}