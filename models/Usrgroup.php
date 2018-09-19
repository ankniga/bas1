<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "usrgroup".
 *
 * @property string $iduser
 * @property string $idgroup
 */
class Usrgroup extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usrgroup';
    }

    
    

    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduser', 'idgroup'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iduser' => 'Iduser',
            'idgroup' => 'Idgroup',
        ];
    }
}
