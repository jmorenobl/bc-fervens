<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function kt_fervens_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['kt_fervens'] = array(
    '#type'  => 'fieldset',
    '#title' => t('Fervens settings'),
  );
  $form['kt_fervens']['layout_type'] = array(
    '#type'          => 'radios',
    '#title'         => t('Layout type'),
    '#default_value' => theme_get_setting('layout_type'),
    '#description'   => t('Select the layout type to use.'),
    '#options'       => array(
      'fixed' => t('Fixed width (960 pixels wide)'),
      'fluid' => t('Fluid width (Maximum 1280 pixels wide)'),
    ),
  );

  $form['kt_fervens']['layout_column_type'] = array(
    '#type'          => 'radios',
    '#title'         => t('Layout column type'),
    '#default_value' => theme_get_setting('layout_column_type'),
    '#description'   => t('Choose between 3 column types.'),
    '#options'       => array(
      'fervens-a' => t('Fervens A (Left, Content, Right)'),
      'fervens-b' => t('Fervens B (Left, Right, Content'),
      'fervens-c' => t('Fervens C (Content, Left, Right'),
    ),
  );
}