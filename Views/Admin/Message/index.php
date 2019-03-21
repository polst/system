<?php

use CodeIgniter\Events\Events;
use BasicApp\System\Models\MessageModel;

require __DIR__ . '/_common.php';

$this->data['actionMenu'][] = [
	'url' => classic_url('admin/message/create', ['returnUrl' => 'admin/message']), 
	'label' => t('admin.menu', 'Add'), 
	'icon' => 'fa fa-plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$rows = [];

foreach($elements as $model)
{
    $rows[] = app_view('BasicApp\System\Admin\Message\_row', ['model' => $model]);
}

echo admin_theme_widget('table', [
    'head' => [
        'columns' => [
            ['content' => '#', 'preset' => 'id small'],
            ['content' => MessageModel::fieldLabel('message_uid')],
            ['content' => MessageModel::fieldLabel('message_subject'), 'preset' => 'small'],
            ['content' => MessageModel::fieldLabel('message_enabled')]
            ['options' => ['colspan' => 2]]
        ]
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}