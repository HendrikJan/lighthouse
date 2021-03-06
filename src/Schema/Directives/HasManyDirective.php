<?php

namespace Nuwave\Lighthouse\Schema\Directives;

use Nuwave\Lighthouse\Support\Contracts\DefinedDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldManipulator;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;

class HasManyDirective extends RelationDirective implements FieldResolver, FieldManipulator, DefinedDirective
{
    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name(): string
    {
        return 'hasMany';
    }

    public static function definition(): string
    {
        return /* @lang GraphQL */ <<<'SDL'
"""
Corresponds to [the Eloquent relationship HasMany](https://laravel.com/docs/eloquent-relationships#one-to-many).
"""
directive @hasMany(
  """
  Specify the relationship method name in the model class,
  if it is named different from the field in the schema.
  """
  relation: String
  
  """
  Apply scopes to the underlying query.
  """
  scopes: [String!]

  """
  ALlows to resolve the relation as a paginated list.
  Allowed values: paginator, connection.
  """
  type: String

  """
  Specify the default quantity of elements to be returned.
  Only applies when using pagination.
  """
  defaultCount: Int
  
  """
  Specify the maximum quantity of elements to be returned.
  Only applies when using pagination.
  """
  maxCount: Int
  
  """
  Specify a custom type that implements the Edge interface
  to extend edge object.
  Only applies when using Relay style "connection" pagination.
  """
  edgeType: String
) on FIELD_DEFINITION
SDL;
    }
}
