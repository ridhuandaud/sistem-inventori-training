<?php

namespace app\modules\asset\models;

use app\modules\asset_owner\models\AssetOwner;
use app\modules\borrow\models\Borrow;
use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AssetOwner[] $assetOwners
 * @property Borrow[] $borrows
 */
class Asset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'required'],
            [['name'], 'string', 'max' => 10],
            [['created_at'], 'datetime'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssetOwners()
    {
        return $this->hasMany(AssetOwner::className(), ['asset_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorrows()
    {
        return $this->hasMany(Borrow::className(), ['asset_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AssetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetsQuery(get_called_class());
    }
}
