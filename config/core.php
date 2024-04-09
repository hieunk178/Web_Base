<?php

return [
    'admin' => [
        'setting' => [
            [
                'key' => 'cache_clear',
                'name' => 'Xóa cache',
                'description' => 'Xóa cache hệ thống',
                'route' => 'admin.setting.cache_clear',
                'group' => 'command',
            ],
            [
                'key' => 'excel_config',
                'name' => 'Excel config',
                'description' => 'Cấu hình import cho file excel',
                'route' => 'admin.setting.excel.edit',
                'group' => 'command',
            ],
            [
                'key' => 'other_config',
                'name' => 'Cấu hình khác',
                'description' => 'Cấu hình khác: logo, favicon, ...',
                'route' => 'admin.setting.other_config',
                'group' => 'command',
            ],
            // [
            //     'key' => 'menu',
            //     'name' => 'Menu',
            //     'description' => 'Menu website',
            //     'route' => 'admin.setting.menu',
            //     'group' => 'command',
            //     'positions' => [
            //         [
            //             "position" => "main",
            //             "title" => 'Main',
            //             "description" => 'Main',
            //         ],
            //         [
            //             "position" => "footer-1",
            //             "title" => 'footer-1',
            //             "description" => 'footer-1',
            //         ],
            //         [
            //             "position" => "footer-2",
            //             "title" => 'footer-2',
            //             "description" => 'footer-2',
            //         ]
            //     ]
            // ],
            [
                'key' => 'migrate',
                'name' => 'Migrate database',
                'description' => 'Migrate database',
                'route' => 'admin.setting.migrate',
                'group' => 'command',
            ],
        ]
    ]
];
