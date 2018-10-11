<?php

namespace app\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "borrow".
 *
 * @property int $id
 * @property int $user_id
 * @property int $asset_id
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Assets $asset
 * @property User $user
 */
class Borrow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrow';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'asset_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['desc'], 'string', 'max' => 200],
            //[['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assets::className(), 'targetAttribute' => ['asset_id' => 'id']],
            //  [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'asset_id' => 'Asset ID',
            'desc' => 'Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(Assets::className(), ['id' => 'asset_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return BorrowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BorrowQuery(get_called_class());
    }
}
