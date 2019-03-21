<?php

echo admin_theme_widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'message_uid', 
    'value' => $model->message_uid,
    'label' => $model->fieldLabel('message_uid')
]);

echo admin_theme_widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'message_subject', 
    'value' => $model->message_subject,
    'label' => $model->fieldLabel('message_subject')
]);

echo admin_theme_widget('formFieldTextarea', [
    'preset' => 'code',
    'errors' => $errors, 
    'name' => 'message_body', 
    'value' => $model->message_body,
    'label' => $model->fieldLabel('message_body')
]);

echo admin_theme_widget('formFieldCheckbox', [
    'errors' => $errors, 
    'name' => 'message_is_html', 
    'value' => $model->message_is_html,
    'label' => $model->fieldLabel('message_is_html')
]);

echo admin_theme_widget('formFieldCheckbox', [
    'errors' => $errors, 
    'name' => 'message_send_copy_to_admin', 
    'value' => $model->message_send_copy_to_admin,
    'label' => $model->fieldLabel('message_send_copy_to_admin')
]);

echo admin_theme_widget('formFieldCheckbox', [
    'errors' => $errors, 
    'name' => 'message_enabled', 
    'value' => $model->message_enabled,
    'label' => $model->fieldLabel('message_enabled')
]);

echo admin_theme_widget('formErrors', ['errors' => $errors]);

echo admin_theme_widget('formButton', [
    'type' => 'submit', 
    'label' => $model->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Insert')
]);