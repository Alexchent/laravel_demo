<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class Status extends GraphQLType
{
    protected $attributes = [
        'name' => 'Status',
        'description' => '动态'
    ];

    public function fields(): array
    {
        return [
            'id' =>[
                'type'=> Type::int(),
                'description' => ''
            ],
            'content' => [
                'type'=> Type::string(),
                'description' => '内容'
            ],
        ];
    }
}
