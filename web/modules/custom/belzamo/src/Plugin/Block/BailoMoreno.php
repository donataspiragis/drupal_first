<?php

namespace Drupal\belzamo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "bailo_moreno",
 *   admin_label = @Translation("Hello Bailo"),
 *   category = @Translation("Hello Moreno"),
 * )
 */
class BailoMoreno extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Bailo Moreno!'),
      '#attached' => [
        'library' => [
          'belzamo/firstjs',
        ],
      ],
    ];
  }

}
