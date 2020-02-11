<?php

namespace Drupal\belzamo\Controller;

use Drupal\Core\Controller\ControllerBase;


class BelzamoController extends ControllerBase {

  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => t('My menu link'),
    ];
  }

}
