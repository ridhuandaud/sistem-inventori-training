<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\asset_owner\models\AssetOwner */

$this->title = 'Create Asset Owner';
$this->params['breadcrumbs'][] = ['label' => 'Asset Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-owner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
