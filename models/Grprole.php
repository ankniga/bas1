<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grprole".
 *
 * @property string $idgroup
 * @property string $idrole
 */
class Grprole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grprole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idgroup', 'idrole'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgroup' => 'Idgroup',
            'idrole' => 'Idrole',
        ];
    }
}
