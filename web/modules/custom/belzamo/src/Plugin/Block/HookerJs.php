<?php

namespace Drupal\belzamo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hooker' Block.
 *
 * @Block(
 *   id = "hooker_js",
 *   admin_label = @Translation("Hooker Js"),
 *   category = @Translation("Hooker Js"),
 * )
 */
class HookerJs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('I am hook!'),
    ];
  }

}
