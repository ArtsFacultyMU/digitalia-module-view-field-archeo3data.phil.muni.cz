<?php

/**
 * @file
 * Definition of Drupal\digitalia_muni_view_field\Plugin\views\field\NumberOfInstancesCsv
 */

namespace Drupal\digitalia_muni_view_field\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Field handler to flag the node type.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("number_of_instances_csv")
 */
class NumberOfInstancesCsv extends FieldPluginBase {

  /**
   * @{inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }

  /**
   * Define the available options
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    return $options;
  }

  /**
   * Provide the options form.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $entity = $this->getEntity($values);
    $items = $entity->get('field_number_of_instances')->getValue();

    $result = "";
    foreach ($items as $value) {
      if ($result !== "") {
        $result .= " | ";
      }
      
      $is_exact = $value['is_exact'];
      if ($is_exact !== null && !$is_exact) {
        $result .= "'at least '";
      }

      $quantity = $value['quantity'];
      if ($quantity) {
        $result .= $quantity;
      }
    }

    return $this->t($result);
  }

}
