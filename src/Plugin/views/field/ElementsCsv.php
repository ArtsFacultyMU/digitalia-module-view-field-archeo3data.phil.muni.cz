<?php

/**
 * @file
 * Definition of Drupal\digitalia_muni_view_field\Plugin\views\field\ElementsCsv
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
 * @ViewsField("elements_csv")
 */
class ElementsCsv extends FieldPluginBase {

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
    $items = $entity->get('field_elements')->getValue();

    $result = "";
    foreach ($items as $value) {
      if ($result !== "") {
        $result .= " | ";
      }
      
      $element_id = $value['element'];
      if ($element_id) {
        $element = Term::load($element_id);
        $result .= "'" . $element->getName() . "'";
      }
      $result .= ",";

      $percent = $value['value'];
      if ($percent) {
        $result .= "'" . $percent . "PPM'";
      }
    }

    return $this->t($result);
  }

}
