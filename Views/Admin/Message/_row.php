<?php

echo admin_theme_widget('tableRow', [
    'columns' => [
        [
            'preset' => 'id small',
            'content' => $model->message_id
        ],
        [
            'content' => $model->message_uid
        ],
        [
            'preset' => 'small',
            'content' => $model->message_subject
        ],
        [
            'content' => $model->message_enabled ? t('admin', 'Enabled') : t('admin', 'Disabled')
        ]
        [
            'preset' => 'button',
            'content' => admin_theme_widget('tableButtonUpdate', [
                'url' => classic_url('admin/message/update', ['id' => $model->getPrimaryKey()]),
                'label' => t('admin', 'Update')
            ])
        ],
        [
            'preset' => 'button',
            'content' => admin_theme_widget('tableButtonDelete', [
                'url' => classic_url('admin/message/delete', ['id' => $model->getPrimaryKey()]),
                'label' => t('admin', 'Delete')
            ])
        ]
    ]
]);