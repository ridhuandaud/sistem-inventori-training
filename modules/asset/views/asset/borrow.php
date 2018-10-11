<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\asset\models\AssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borrow Asset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'name',
            [
                'attribute' => 'name',
                'value' => function ($model) {
        //var_dump($model->assetOwners->id);
                    $owner = $model->assetOwners->id;
                    if($owner)
                    {
                        return 'Faiz';
                    }

                    return 'Farid';

                },
                'visible' => \Yii::$app->user->can('admin'),
            ],
            'created_at',
            [
                    'class' => 'yii\grid\ActionColumn',

            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
