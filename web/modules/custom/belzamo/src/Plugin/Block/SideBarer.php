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

    if (!empty($config['link'])) {
      $link = $config['link'];
      $text = strip_tags($config['text']);
      $html = $config['html'];
    }
    else {
      $link = $this->t('to no one');
      $text = $config['text'];
      $html = $config['html'];
    }
    return array(
      '#theme' => 'belzamo_theme',
      '#link' => $link,
      '#text' => $text,
      '#html' => $html,
      );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $default_config = \Drupal::config('belzamo.settings');
    $config = $this->getConfiguration();

    $form['link'] = array (
      '#type' => 'url',
      '#title' => $this->t('Insert hyperlink'),
      '#description' => $this->t('What link you want'),
      '#default_value' => isset($config['link']) ? $config['link'] : $default_config->get('disc.link'),

    );
    $form['text'] = array (
      '#type' => 'textarea',
      '#title' => $this->t('Insert your Simple text'),
      '#description' => $this->t('This text will be simple'),
      '#default_value' => isset($config['text']) ? $config['text'] : $default_config->get('disc.text'),
    );
    $form['html'] = array (
      '#type' => 'textarea',
      '#title' => $this->t('Insert HTML'),
      '#description' => $this->t('This text will show Html tags'),
      '#default_value' => isset($config['html']) ? $config['html'] : $default_config->get('disc.html'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('link', $form_state->getValue('link'));
    $this->setConfigurationValue('text', $form_state->getValue('text'));
    $this->setConfigurationValue('html', $form_state->getValue('html'));
  }

  public function blockAccess(AccountInterface $account)
  {

    if(\Drupal::currentUser()->isAuthenticated()){
      return AccessResult::allowedIfHasPermission($account, 'view belza_form');
    }
    return AccessResult::forbidden();
  }
}
