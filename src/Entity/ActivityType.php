<?php

namespace Drupal\activitystreams\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\activitystreams\ActivityTypeInterface;

/**
 * Defines the Activity type entity.
 *
 * @ConfigEntityType(
 *   id = "activity_type",
 *   label = @Translation("Activity type"),
 *   handlers = {
 *     "list_builder" = "Drupal\activitystreams\ActivityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\activitystreams\Form\ActivityTypeForm",
 *       "edit" = "Drupal\activitystreams\Form\ActivityTypeForm",
 *       "delete" = "Drupal\activitystreams\Form\ActivityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\activitystreams\ActivityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "activity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "activity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/activity/{activity_type}",
 *     "add-form" = "/admin/structure/activity/add",
 *     "edit-form" = "/admin/structure/activity/{activity_type}/edit",
 *     "delete-form" = "/admin/structure/activity/{activity_type}/delete",
 *     "collection" = "/admin/structure/activity"
 *   }
 * )
 */
class ActivityType extends ConfigEntityBundleBase implements ActivityTypeInterface {
  /**
   * The Activity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Activity type label.
   *
   * @var string
   */
  protected $label;

}
