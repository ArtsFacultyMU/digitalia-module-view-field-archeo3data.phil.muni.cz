<?php

/**
 * @file
 * Definition of Drupal\digitalia_muni_view_field\Plugin\views\field\ChemicalAnalysisCsv
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
 * @ViewsField("chemical_analysis_csv")
 */
class ChemicalAnalysisCsv extends FieldPluginBase {

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
    $items = $entity->get('field_chemical_analysis')->getValue();

    $result = "";
    foreach ($items as $value) {
      if ($result !== "") {
        $result .= " | ";
      }
      
      $chemical_id = $value['chemical'];
      if ($chemical_id) {
        $chemical = Term::load($chemical_id);
        $result .= "'" . $chemical->getName() . "'";
      }
      $result .= ",";

      $percent = $value['value'];
      if ($percent) {
        $result .= "'" . $percent . "%'";
      }
    }

    return $this->t($result);
  }

}
