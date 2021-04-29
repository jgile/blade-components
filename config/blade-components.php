<?php

return [
    /*
     * Component prefix - default is none.
     * 'foo' would result in components like <x-foo-badge></x-foo-badge>
     */
    'prefix' => '',
    'variant_prefix' => 'v',

    /*
     * Component config
     */
    'components' => [
        'button' => [
            'variants' => [
                'size' => [
                    'xs' => 'px-2 py-0 text-xs rounded',
                    'sm' => 'px-3 py-1 text-xs leading-4 rounded-md',
                    'md' => 'px-6 py-3 text-xs rounded-lg',
                    'lg' => 'px-8 py-3 text-sm rounded-lg',
                    'xl' => 'px-10 py-3 text-md rounded-lg'
                ],
                'color' => [
                    'white' => 'text-md uppercase font-bold text-gray-dark bg-white hover:bg-gray-50 border border-2 border-gray-dark disabled:opacity-50 font-bold',
                    'red' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-300 disabled:opacity-50',
                    'green' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-300 disabled:opacity-50',
                    'gray' => 'bg-gray-300 text-black hover:bg-gray-400 focus:ring-gray-300 disabled:opacity-50',
                    'purple' => 'bg-purple-light text-black hover:bg-purple-400 focus:ring disabled:opacity-50',
                    'black' => 'bg-black text-white hover:bg-gray-dark focus:ring disabled:opacity-50',
                    'link' => 'bg-transparent text-inherit hover:underline focus:underline disabled:opacity-50',
                ]
            ],
            'default_variant' => ['size.md', 'color.purple'],
            'base' => 'inline-flex items-center justify-center font-bold border border-transparent shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2',
        ],
        'badge' => [
            'variants' => [
                'red' => 'bg-red-100 text-red-800',
                'green' => 'bg-green-100 text-green-800',
                'gray' => 'bg-gray-200 text-gray-800',
                'black' => 'bg-gray-900 text-white',
            ],
            'default_variant' => 'green',
            'base' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full'
        ],
        'input' => [
            'base' => 'w-full bg-white block rounded-md border-gray-300 border box-border cursor-text leading-normal shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            'default_variant' => 'size.md',
            'variants' => [
                'size' => [
                    'sm' => 'p-1 text-base',
                    'md' => 'p-2 text-base',
                    'lg' => 'p-2 text-xl leading-normal',
                ],
                'state' => [
                    'error' => 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500'
                ]
            ]
        ],
        'select' => [
            'base' => 'bg-white cursor-pointer block rounded-md border-gray-300 border box-border leading-normal shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            'default_variant' => 'md',
            'variants' => [
                'sm' => 'mx-0 mb-0 mt-1 py-1 pl-2 pr-5 text-sm',
                'md' => 'mx-0 mb-0 mt-1 py-2 pl-3 pr-10 text-base',
                'lg' => 'mx-0 mb-0 mt-1 py-2 pl-3 pr-10 text-base',
            ]
        ],
        'radio' => [
            'base' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300',
        ],
        'checkbox' => [
            'base' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded'
        ],
        'textarea' => [
            'base' => 'bg-white block rounded-md border-gray-300 border box-border mx-0 mb-0 mt-1 py-2 px-3 cursor-text text-base leading-normal shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
        ],
        'img' => [
            'round' => 'rounded-full'
        ],
        'label' => [
            'base' => 'block text-sm font-medium text-gray-700'
        ],
        'validation_errors' => [
            'base' => 'text-xs text-red-600'
        ],
        'input-errors' => [
            'base' => 'mt-2 text-sm text-red-600'
        ],
        'input-description' => [
            'base' => 'mt-1 text-sm text-gray-500'
        ],
        'spinner' => [
            'base' => 'far fa-spinner fa-spin'
        ]
    ]
];
