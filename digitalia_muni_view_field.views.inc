<?php

/**
 * @file
 * Primary module hooks for digitalia_muni_view_field module.
 */

/**
 * Implements hook_views_data().
 */

/**
 * Implements hook_views_data_alter().
 */
function digitalia_muni_view_field_views_data_alter(array &$data) {
  $data['node']['alternative_ids_csv'] = array(
    'title' => t('Alternative IDs CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('A3D Alternative IDs CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'alternative_ids_csv',
    ),
  );
  $data['node']['measurements_csv'] = array(
    'title' => t('Measurements CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('Measurements CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'measurements_csv',
    ),
  );
  $data['node']['number_of_instances_csv'] = array(
    'title' => t('Number of instances CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('Number of instances CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'number_of_instances_csv',
    ),
  );
  $data['node']['surface_finishing_csv'] = array(
    'title' => t('surface finishing CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('Surface finishing CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'surface_finishing_csv',
    ),
  );
  $data['node']['chemical_analysis_csv'] = array(
    'title' => t('Chemical analysis CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('Chemical analysis CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'chemical_analysis_csv',
    ),
  );
  $data['node']['elements_csv'] = array(
    'title' => t('Elements CSV'),
    'group' => t('Content'),
    'field' => array(
      'title' => t('Elements CSV'),
      'help' => t('Digitalia muni view field'),
      'id' => 'elements_csv',
    ),
  );
} 
