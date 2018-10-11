<?php

namespace app\modules\asset_owner\models;

/**
 * This is the ActiveQuery class for [[AssetOwner]].
 *
 * @see AssetOwner
 */
class AssetOwnerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssetOwner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssetOwner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
