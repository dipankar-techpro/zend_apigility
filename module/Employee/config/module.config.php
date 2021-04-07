<?php
return [
    'router' => [
        'routes' => [
            'employee.rest.salary' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/salary[/:salary_id]',
                    'defaults' => [
                        'controller' => 'Employee\\V1\\Rest\\Salary\\Controller',
                    ],
                ],
            ],
            'employee.rest.employee' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/employee[/:employee_id]',
                    'defaults' => [
                        'controller' => 'Employee\\V1\\Rest\\Employee\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'employee.rest.salary',
            1 => 'employee.rest.employee',
        ],
    ],
    'zf-rest' => [
        'Employee\\V1\\Rest\\Salary\\Controller' => [
            'listener' => 'Employee\\V1\\Rest\\Salary\\SalaryResource',
            'route_name' => 'employee.rest.salary',
            'route_identifier_name' => 'salary_id',
            'collection_name' => 'salary',
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
            'entity_class' => \Employee\V1\Rest\Salary\SalaryEntity::class,
            'collection_class' => \Employee\V1\Rest\Salary\SalaryCollection::class,
            'service_name' => 'salary',
        ],
        'Employee\\V1\\Rest\\Employee\\Controller' => [
            'listener' => 'Employee\\V1\\Rest\\Employee\\EmployeeResource',
            'route_name' => 'employee.rest.employee',
            'route_identifier_name' => 'employee_id',
            'collection_name' => 'employee',
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
            'entity_class' => \Employee\V1\Rest\Employee\EmployeeEntity::class,
            'collection_class' => \Employee\V1\Rest\Employee\EmployeeCollection::class,
            'service_name' => 'employee',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Employee\\V1\\Rest\\Salary\\Controller' => 'HalJson',
            'Employee\\V1\\Rest\\Employee\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Employee\\V1\\Rest\\Salary\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Employee\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Employee\\V1\\Rest\\Salary\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/json',
            ],
            'Employee\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Employee\V1\Rest\Salary\SalaryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.salary',
                'route_identifier_name' => 'salary_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Employee\V1\Rest\Salary\SalaryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.salary',
                'route_identifier_name' => 'salary_id',
                'is_collection' => true,
            ],
            \Employee\V1\Rest\Employee\EmployeeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.employee',
                'route_identifier_name' => 'employee_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Employee\V1\Rest\Employee\EmployeeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.employee',
                'route_identifier_name' => 'employee_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'Employee\\V1\\Rest\\Salary\\SalaryResource' => [
                'adapter_name' => 'Blog',
                'table_name' => 'salary',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Employee\\V1\\Rest\\Salary\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'Employee\\V1\\Rest\\Employee\\EmployeeResource' => [
                'adapter_name' => 'Blog',
                'table_name' => 'employee',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Employee\\V1\\Rest\\Employee\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Employee\\V1\\Rest\\Salary\\Controller' => [
            'input_filter' => 'Employee\\V1\\Rest\\Salary\\Validator',
        ],
        'Employee\\V1\\Rest\\Employee\\Controller' => [
            'input_filter' => 'Employee\\V1\\Rest\\Employee\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Employee\\V1\\Rest\\Salary\\Validator' => [
            0 => [
                'name' => 'employee_id',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => [
                            'adapter' => 'Blog',
                            'table' => 'employee',
                            'field' => 'id',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'salary',
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
        'Employee\\V1\\Rest\\Employee\\Validator' => [
            0 => [
                'name' => 'name',
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
                'name' => 'email',
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
                            'max' => '50',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'phone',
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
                            'max' => '20',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'status',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
];
