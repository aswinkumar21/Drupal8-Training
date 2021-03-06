<?php


namespace Drupal\time_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Time' block.
 *
 * @Block(
 *  id = "time_block",
 *  admin_label = @Translation("Recent Time Module"),
 * )
 */
class TimeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#description' => $this->t('To add message'),
      '#default_value' => $this->t('To add message'),
      '#weight' => '0',
    ];
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#default_value' => $this->t('Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['message'] = $form_state->getValue('message');
    $this->configuration['name'] = $form_state->getValue('name');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'time_module';
    $build['#content'][] = $this->configuration['message'];
    $build['#content'][] = $this->configuration['name'];
    //kint($build);
    return $build;
  }

}
