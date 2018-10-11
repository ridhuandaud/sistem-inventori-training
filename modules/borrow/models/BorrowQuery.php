<?php

namespace app\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Borrow]].
 *
 * @see Borrow
 */
class BorrowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Borrow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Borrow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
