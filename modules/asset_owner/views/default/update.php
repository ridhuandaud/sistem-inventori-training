<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\asset_owner\models\AssetOwner */

$this->title = 'Update Asset Owner: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Asset Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-owner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
