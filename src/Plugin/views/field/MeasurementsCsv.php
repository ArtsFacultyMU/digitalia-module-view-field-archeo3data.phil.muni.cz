<?php

/**
 * @file
 * Definition of Drupal\digitalia_muni_view_field\Plugin\views\field\MeasurementsCsv
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
 * @ViewsField("measurements_csv")
 */
class MeasurementsCsv extends FieldPluginBase {

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
    $items = $entity->get('field_measurements')->getValue();

    $result = "";
    foreach ($items as $value) {
      if ($result !== "") {
        $result .= " | ";
      }
      
      $dimensions_type_id = $value['dimensions_type'];
      if ($dimensions_type_id) {
        $dimensions_type = Term::load($dimensions_type_id);
        $result .= "'" . $dimensions_type->getName() . "'";
      }
      $result .= ",";

      $dimensions_value = $value['dimensions_value'];
      if ($dimensions_value) {
        $result .= "'" . $dimensions_value . "'";
      }
      $result .= ",";

      $dimensions_unit_id = $value['dimensions_unit'];
      if ($dimensions_unit_id) {
        $dimensions_unit = Term::load($dimensions_unit_id);
        $result .= "'" . $dimensions_unit->getName() . "'";
      }
      $result .= ",";

      $dimensions_extent_id = $value['dimensions_extent'];
      if ($dimensions_extent_id) {
        $dimensions_extent = Term::load($dimensions_extent_id);
        $result .= "'" . $dimensions_extent->getName() . "'";
      }
      $result .= ",";

      $scale_type_id = $value['scale_type'];
      if ($scale_type_id) {
        $scale_type = Term::load($scale_type_id);
        $result .= "'" . $scale_type->getName() . "'";
      }
      $result .= ",";

      $dimensions_qualifier_id = $value['dimensions_qualifier'];
      if ($dimensions_qualifier_id) {
        $dimensions_qualifier = Term::load($dimensions_qualifier_id);
        $result .= "'" . $dimensions_qualifier->getName() . "'";
      }
      $result .= ",";

      $measurement_date = $value['measurement_date'];
      if ($measurement_date) {
        $result .= "'" . $measurement_date . "'";
      }
      $result .= ",";

      $shape_id = $value['shape'];
      if ($shape_id) {
        $shape = Term::load($shape_id);
        $result .= "'" . $shape->getName() . "'";
      }
      $result .= ",";

      $format_size_id = $value['format_size'];
      if ($format_size_id) {
        $format_size = Term::load($format_size_id);
        $result .= "'" . $format_size->getName() . "'";
      }
      $result .= ",";

      $remarks = $value['remarks'];
      if ($remarks) {
        $result .= "'" . $remarks . "'";
      }
      $result .= ",";

      $citations = $value['citations'];
      if ($citations) {
        $result .= "'" . $citations . "'";
      }

    }

    return $this->t($result);
  }

}
