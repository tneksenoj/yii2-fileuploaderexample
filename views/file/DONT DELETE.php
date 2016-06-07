     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'location',
            'orig_name',
            'alias_name',
        ],
    ]) ?> 