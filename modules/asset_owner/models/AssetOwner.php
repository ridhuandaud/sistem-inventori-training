<?php

namespace app\modules\asset_owner\models;

use app\modules\asset\models\Asset;
use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "asset_owner".
 *
 * @property string $id
 * @property int $asset_id
 * @property int $status
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Asset $asset
 * @property User $user
 */
class AssetOwner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_id', 'status', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asset::className(), 'targetAttribute' => ['asset_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asset_id' => 'Asset ID',
            'status' => 'Status',
            'user_id' => 'User ID',
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
     * @return AssetOwnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetOwnerQuery(get_called_class());
    }
}
