<?php
/**
 * @file
 * Contains \Drupal\belzamo\Form\LinksForm
 */

namespace Drupal\belzamo\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class LinksForm extends FormBase {
  public function getFormId()
  {
    return 'links_form';
  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form['text'] = [
      '#title' => t('Text'),
      '#type' => 'textarea',
      '#size' => 25,
      '#description' => t(""),
      '#required' => True,
    ];
    $form['test_ink'] = [
      '#type' => 'url',
      '#title' => $this->t('Link title'),
      '#url' => '',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];
    return $form;

  }

  /**
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    return 'hell';
  }
}
