<?php
return [
    'shopee_item' => [
        'status' => [
            'get_basic_info' => 1,
            'info' => 2,
            'error' => 3,
            'prepare_get_info' => 4,
        ]
    ],
    'site_identifier' => env('SITE_IDENTIFIER'),
    'sce_key' => env('SCE_KEY'),

    'crawl_keyword' => [
        'status' => [
            'new' => 0,
            'crawl_done' => 1,
            'error' => -1,
        ]
    ],
    'crawl_post' => [
        'status' => [
            'error' => -1,
            'new' => 1,
            'info' => 2,
            'done' => 3,
            'production' => 4,
        ]
    ],
    'crawl_post_detail' => [
        'status' => [
            'error' => -1,
            'new' => 1,
            'info' => 2,
            'done' => 3,
        ]
    ],

    "menu" => [
        1 => [
            "name" => "Sản phẩm",
            "slug" => "san-pham"
        ],
        2 => [
            "name" => "Mã giảm giá",
            "slug" => "ma-giam-gia"
        ],
        3 => [
            "name" => "Xu hướng",
            "slug" => "xu-huong"
        ]
    ]
];
