<?php

namespace Basetime\A2w;

/**
 * Hydrates objects from api responses.
 */
trait Hydrator
{
  /**
   * Hydrates self from an array of values.
   *
   * Given entity objects returned by the api, this method will hydrate the
   * self with the values by looking at the properties defined in the class.
   */
  protected function hydrateProperties(array $values)
  {
    $ref = new \ReflectionObject($this);
    foreach ($ref->getProperties() as $prop) {
      $name = $prop->getName();
      $type = $prop->getType();

      if (!isset($values[$name]) && !$type->allowsNull()) {
        throw new \InvalidArgumentException(
          sprintf("API returned missing required property `%s` hydrating %s.", $name, get_class($this))
        );
      }

      switch ($type->getName()) {
        case 'string':
          $this->$name = $values[$name] ?? null;
          break;
        case 'int':
          $this->$name = $values[$name] ?? null;
          break;
        case 'bool':
          $this->$name = $values[$name] ?? null;
          break;
        case 'array':
          $this->$name = $values[$name] ?? null;
          break;
        case 'DateTime':
          $this->$name = $values[$name] ? new \DateTime($values[$name]) : null;
          break;
        default:
          $this->$name = $this->hydrate($type->getName(), $values[$name]);
          break;
      }
    }
  }

  /**
   * Hydrates an object of a given type.
   *
   * For non-built-in types, this method will create an instance of the type
   * and hydrate it with the values.
   */
  protected function hydrate(string $type, array $values): mixed
  {
    switch ($type) {
      case Organization::class:
        return new Organization($values);
      case Template::class:
        return new Template($values);
      case Schedule::class:
        return new Schedule($values);
      case CampaignStats::class:
        return new CampaignStats($values);
      case Domain::class:
        return new Domain($values);
      case User::class:
        return new User($values);
      default:
        throw new \InvalidArgumentException("Unknown type `$type`.");
    }
  }
}
