<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Status;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class GetStatuses extends Query
{
    protected $attributes = [
        'name' => 'getStatuses',
        'description' => '获取动态'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Status'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return Status::all();
    }
}
