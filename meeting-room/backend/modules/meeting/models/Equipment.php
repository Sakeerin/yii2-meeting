<?php

namespace backend\modules\meeting\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $equipment อุปกรณ์
 * @property string $description รายละเอียด
 * @property string $photo รูปอุปกรณ์
 *
 * @property Uses[] $uses
 * @property Meeting[] $meetings
 */
class Equipment extends \yii\db\ActiveRecord
{
    public $equip_img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment', 'description', 'photo'], 'required'],
            [['description'], 'string'],
            [['equipment', 'photo'], 'string', 'max' => 100],
            [['equip_img'],'file','skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment' => 'อุปกรณ์',
            'description' => 'รายละเอียด',
            'photo' => 'รูปอุปกรณ์',
            'equip_img' => 'รูปอุปกรณ์',
        ];
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(Uses::className(), ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['id' => 'meeting_id'])->viaTable('uses', ['equipment_id' => 'id']);
    }
}