<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_next_of_kin".
 *
 * @property int $next_of_kin_id
 * @property int $adm_refno
 * @property string|null $surname
 * @property string|null $other_names
 * @property string|null $relationship
 * @property string|null $primary_phone_number
 * @property string|null $alternative_phone_number
 * @property string|null $primary_email
 * @property string|null $alternative_email
 */
class SmNextOfKin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_next_of_kin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['next_of_kin_id', 'adm_refno', 'surname', 'other_names', 'relationship', 'primary_phone_number', 'primary_email'], 'required'],
            [['next_of_kin_id', 'adm_refno'], 'default', 'value' => null],
            [['next_of_kin_id', 'adm_refno'], 'integer'],
            [['surname', 'other_names', 'relationship'], 'string', 'max' => 150],
            [['primary_phone_number', 'alternative_phone_number'], 'string', 'max' => 50],
            [['primary_email', 'alternative_email'], 'string', 'max' => 100],
            [['next_of_kin_id'], 'unique'],
            [['adm_refno'], 'exist', 'skipOnError' => true, 'targetClass' => SmAdmittedStudent::class, 'targetAttribute' => ['adm_refno' => 'adm_refno']],
            [['primary_email', 'alternative_email'], 'email'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'next_of_kin_id' => 'Next Of Kin ID',
            'adm_refno' => 'Adm Refno',
            'surname' => 'Surname',
            'other_names' => 'Other Names',
            'relationship' => 'Relationship',
            'primary_phone_number' => 'Primary Phone Number',
            'alternative_phone_number' => 'Alternative Phone Number',
            'primary_email' => 'Primary Email',
            'alternative_email' => 'Alternative Email',
        ];
    }
}
