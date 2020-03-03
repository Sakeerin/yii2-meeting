<?php

namespace backend\modules\meeting\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\Person;

/**
 * This is the model class for table "meeting".
 *
 * @property int $id
 * @property string $title เรื่อง
 * @property string $description รายละเอียด
 * @property string $date_start เริ่ม
 * @property string $date_end สิ้นสุด
 * @property string|null $created_at เพิ่มเมื่อ
 * @property string|null $updated_at แก้ไขเมื่อ
 * @property int $room_id ห้องประชุม
 * @property int $user_id ผู้จอง
 * @property string $status สถานะการจอง
 *
 * @property Person $user
 * @property Room $room
 * @property Uses[] $uses
 * @property Equipment[] $equipment
 */
class Meeting extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'date_start', 'date_end', 'room_id', 'user_id'], 'required'],
            [['description', 'status'], 'string'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['room_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 45],
            // [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            // [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'เรื่อง',
            'description' => 'รายละเอียด',
            'date_start' => 'เริ่ม',
            'date_end' => 'สิ้นสุด',
            'created_at' => 'เพิ่มเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'room_id' => 'ห้องประชุม',
            'user_id' => 'ผู้จอง',
            'status' => 'สถานะการจอง',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Uses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(Uses::className(), ['meeting_id' => 'id']);
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('uses', ['meeting_id' => 'id']);
    }
}