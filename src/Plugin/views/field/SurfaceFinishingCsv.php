<?php

/**
 * @file
 * Definition of Drupal\digitalia_muni_view_field\Plugin\views\field\SurfaceFinishingCsv
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
 * @ViewsField("surface_finishing_csv")
 */
class SurfaceFinishingCsv extends FieldPluginBase {

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
    $items = $entity->get('field_surface_finishing')->getValue();

    $result = "";
    foreach ($items as $value) {
      if ($result !== "") {
        $result .= " | ";
      }
      
      $finishing_id = $value['finishing'];
      if ($finishing_id) {
        $finishing = Term::load($finishing_id);
        $result .= "'" . $finishing->getName() . "'";
      }
      $result .= ",";

      $colour_id = $value['colour'];
      if ($colour_id) {
        $colour = Term::load($colour_id);
        $result .= "'" . $colour->getName() . "'";
      }
    }

    return $this->t($result);
  }

}
