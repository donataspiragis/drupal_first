<?php

namespace Drupal\belzamo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a 'Belzo' Block.
 *
 * @Block(
 *   id = "side_barer",
 *   admin_label = @Translation("Side Barer"),
 *   category = @Translation("Sidebar fill"),
 * )
 */
class SideBarer extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['hello_block_settings'])) {
      $name = $config['hello_block_settings'];
    }
    else {
      $name = $this->t('to no one');
    }
    return array(
      '#markup' => $this->t('Hello @name!', array(
          '@name' => $name,
        )
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $default_config = \Drupal::config('hello_world.settings');
    $config = $this->getConfiguration();

    $form['hello_block_settings'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['hello_block_settings']) ? $config['hello_block_settings'] : $default_config->get('hello.name'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('hello_block_settings', $form_state->getValue('hello_block_settings'));
  }

  public function blockAccess(AccountInterface $account)
  {

    if(\Drupal::currentUser()->isAuthenticated()){
      return AccessResult::allowedIfHasPermission($account, 'view belza_form');
    }
    return AccessResult::forbidden();
  }
}
