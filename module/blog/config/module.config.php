<?php
return [
    'router' => [
        'routes' => [
            'blog.rest.post' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/post[/:post_id]',
                    'defaults' => [
                        'controller' => 'blog\\V1\\Rest\\Post\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'blog.rest.post',
        ],
    ],
    'zf-rest' => [
        'blog\\V1\\Rest\\Post\\Controller' => [
            'listener' => 'blog\\V1\\Rest\\Post\\PostResource',
            'route_name' => 'blog.rest.post',
            'route_identifier_name' => 'post_id',
            'collection_name' => 'post',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \blog\V1\Rest\Post\PostEntity::class,
            'collection_class' => \blog\V1\Rest\Post\PostCollection::class,
            'service_name' => 'post',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'blog\\V1\\Rest\\Post\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'blog\\V1\\Rest\\Post\\Controller' => [
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'blog\\V1\\Rest\\Post\\Controller' => [
                0 => 'application/vnd.blog.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \blog\V1\Rest\Post\PostEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog.rest.post',
                'route_identifier_name' => 'post_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \blog\V1\Rest\Post\PostCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog.rest.post',
                'route_identifier_name' => 'post_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'blog\\V1\\Rest\\Post\\PostResource' => [
                'adapter_name' => 'Blog',
                'table_name' => 'post',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'blog\\V1\\Rest\\Post\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'blog\\V1\\Rest\\Post\\Controller' => [
            'input_filter' => 'blog\\V1\\Rest\\Post\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'blog\\V1\\Rest\\Post\\Validator' => [
            0 => [
                'name' => 'title',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'category',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
