<?php

namespace Drupal\belzamo\Plugin\Block;
/**
 * @file
 * contains \Drupal\belzamo\Plugin\Block\BelzamoForm
 */
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * @Block(
 *   id = "BelzamoForm",
 * admin_label = @Translation("Belzamo Form"),
 *   )
 */
class BelzamoForm extends BlockBase {
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\belzamo\Form\BelzamoForm');
  }

public function blockAccess(AccountInterface $account) {
  $node = \Drupal::routeMatch()->getParameter('node');
  $nid = $node->nid->value;
  if (is_numeric($nid)) {
    return AccessResult::allowedIfHasPermission($account, 'View belzamo_form');
  }
  return AccessResult::forbidden();
  }
}


