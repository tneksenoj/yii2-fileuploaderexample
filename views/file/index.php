<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\File;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
/*
$sourcePath = Yii::getAlias('@app') . '/assets/';
$basePath = Yii::getAlias('@webroot');
$baseUrl = Yii::getAlias('@web');
echo "<p>" . $sourcePath . "</p>";
echo "<p>" . $basePath . "</p>";
echo "<p>" . $baseUrl . "</p>";
*/
?>
<!--- div class="file-index" -->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Upload Files', ['upload/upload'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class='w3-row-padding' style = "max-height:160px">
        <?php foreach ( $dataProvider->getModels() as $file ): ?>
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card-8 w3-center" style="width:80%;">
                    <div class="w3-container" style="background-image:url(<?php echo $file->getImageurl()?>);
                        height:10em;
                        background-size:cover;
                        background-position:center;
                        background-repeat:no-repeat;">
                    </div>
                    <div class="w3-container w3-center" >
                        <h4><b><div class="sii-filename-elips"><?php echo $file->orig_name; ?></div> </b></h4>
                        <p>Tropical Island Group id: 1</p>
                      </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<!--     <?= Gridview::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'orig_name',
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Images',
                'value' => function ($data) {
                    return Html::img( $data->getImageurl() ,
                        [ 'height' => '60px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> 

</div>
-->
