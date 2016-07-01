<?php

/**
 * @file
 * Contains activity.page.inc.
 *
 * Page callback for Activity entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Activity templates.
 *
 * Default template: activity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_activity(array &$variables) {
  // Fetch Activity Entity Object.
  $activity = $variables['elements']['#activity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: activity-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of activity-types.
*
* @see block_content_add_page()
*/
function template_preprocess_activity_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  /** @var \Drupal\activitystreams\Entity\ActivityType $type */
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.activity.add_form', array(
        'activity_type' => $type->id()
      ), array('query' => $query))),
      'description' => array(
      '#markup' => $type->label(),
      ),
      'title' => $type->label(),
      'localized_options' => array(
      'query' => $query,
      ),
    );
  }
}
