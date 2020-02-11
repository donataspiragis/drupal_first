<?php

namespace Drupal\belzamo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
/**
 * Provides a 'Belzo' Block.
 *
 * @Block(
 *   id = "belza_form",
 *   admin_label = @Translation("Belzo Form"),
 *   category = @Translation("Forms"),
 * )
 */
class BelzaFrom extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\belzamo\Form\LinksForm');
  }
  public function blockAccess(AccountInterface $account)
  {
    if(\Drupal::currentUser()->isAuthenticated()){
      return AccessResult::allowedIfHasPermission($account, 'view belza_form');
    }
    return AccessResult::forbidden();
  }
}
