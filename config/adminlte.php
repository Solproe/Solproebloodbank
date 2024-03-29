<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
     */

    'title' => '',
    'title_prefix' => 'Solproe | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
     */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
     */
    /*nada*/
    'logo' => '<b>Solproe</b>',
    'logo_img' => 'vendor/adminlte/dist/img/Solproe.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
     */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
     */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
     */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
     */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
     */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
     */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
     */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
     */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
     */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Register with social media',
            'topnav_user' => true,
            'route' => 'register2',

        ],

        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [],
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search', // Placeholder for the underlying input.
            'id' => 'sidebarMenuSearch', // ID attribute for the underlying input (optional).
        ],
        [
            'text' => 'Account_settings',
            'icon' => 'fas fad fa-cogs fa-fw',
            /* 'can' => 'register.users', */
            /*   'role' => ['HHRR', 'System'], */
            'submenu' =>
            [
                [
                    'text' => 'Status',
                    'route' => 'status.index',
                    'icon' => 'fas fa-check'
                ],

                [
                    'text' => 'Teams',
                    'icon' => 'fas fa-file',
                    'route' => 'teams.index'
                ],

                [
                    'text' => 'Geography',
                    'icon' => 'fas fa-globe',
                    'submenu' => 
                    [
                        [
                            'text' => 'Countries',
                            'icon' => 'fas fa-flag',
                            'route' => 'admin.countries.index'
                        ],

                        [
                            'text' => 'States',
                            'icon' => 'fas fa-map',
                            'route' => 'admin.states.index'
                        ],

                        [
                            'text' => 'Cities',
                            'icon' => 'fas fa-city',
                            'route' => 'admin.towns.index'
                        ]
                    ]
                ],

                [
                    'text' => 'Token',
                    'route' => 'admin.token.index',
                    'icon' => 'fas fa-unlock-alt'
                ],
                [
                    'text' => 'App solproe',
                    'icon' => 'fas fa-mobile-alt',
                    'submenu' =>
                    [
                        [
                            'text' => 'Register _users',
                            'route' => 'register2',
                            /* 'can' => 'register.users', */
                            'role' => ['HHRR', 'System'],
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*  'active' => ['admin/Account_settings*'], */
                        ],
                        [
                            'text' => 'Center',
                            'route' => 'admin.center.index',
                            'role' => ['HHRR', 'System'],
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                        ],
                        [
                            'text' => 'App Users',
                            'route' => 'admin.appUsers.index',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*  'can' => 'register.users', */
                            'role' => ['HHRR', 'System'],
                        ],
                    ],
                ],
                [
                    'text' => 'Roles And Permissions',
                    'icon' => 'fas fa-user-tag',
                    /*  'can' => 'register.users', */
                    'role' => ['HHRR', 'System'],
                    'submenu' =>
                    [
                        [
                            'text' => 'Permissions',
                            'route' => 'RolesAndPermissions.Permissions.index',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*   'can' => 'register.users', */
                            'role' => ['HHRR', 'System'],
                            'active' => ['admin/Account_settings*'],

                        ],

                        [
                            'text' => 'Roles',
                            'route' => 'RolesAndPermissions.Roles.index',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*  'can' => 'register.users', */
                            'role' => ['HHRR', 'System'],
                            'active' => ['admin/Account_settings*'],

                        ],
                    ],

                ],
            ],

        ],

        [
            'text' => 'Promotion_recruitment',
            'icon' => 'fas fa-fill-drip fa-fw',
            'submenu' =>
            [
                [
                    'text' => 'Consult',
                    'route' => 'sihevi.consults.index',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    /*  'active' => ['admin/Donor*'], */
                ],
                [
                    'text' => 'Capture in days',
                    'route' => 'sihevi.consults.index',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    /*  'active' => ['admin/Donor*'], */
                ],
            ],
        ],

        [

            'text' => 'Donors',
            'icon' => 'fas fa-people-arrows fa-fw',
            'submenu' =>
            [
                [
                    'text' => 'Consult',
                    'route' => 'sihevi.consults.index',
                    'icon' => 'fas fa-fw fa-horizontal-rule',
                    'active' => ['admin/Donor*'],

                ],

                [
                    'text' => 'Register Donors',
                    'route' => 'donors.index',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    /* 'active' => ['donor/Donor*'], */
                ],
                [
                    'text' => 'Reports',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    'submenu' => [
                        [
                            'text' => 'Export donor data',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            'route' => 'donor.Reports.export',
                            /* 'active' => ['admin/Management*'], */

                        ],

                        [
                            'text' => 'Import donor data',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            'route' => 'donor.Reports.import',
                            /*  'active' => ['admin/Management*'], */

                        ],
                    ],

                ],

            ],
        ],
        [

            'text' => 'Management',
            'icon' => 'fas fa-chart-line fa-fw',
            'submenu' =>
            [

                [
                    'text' => 'Human talent',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    'submenu' =>
                    [
                        [
                            'text' => 'Human capital',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            'submenu' =>
                            [
                                [
                                    'text' => 'Staff file',
                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                    'route' => 'register2',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Accounting',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    'submenu' =>
                    [
                        [
                            'text' => 'Petty cash',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*  'active' => ['admin/Management*'], */
                            'route' => 'admin.accountings.pettycash.index',
                        ],
                    ],
                ],

                [
                    'text' => 'Customers',
                    'route' => 'admin.requestorings.index',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    /*  'active' => ['admin/Management*'], */
                    /*  'can' => ['customers.index', 'customers.create', 'customers.edit', 'customers.delete'], */
                    'role' => ['Admin', 'System'],
                ],

                [
                    'text' => 'Inventories',
                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                    /* 'active' => ['admin/Management*'], */
                    'submenu' =>
                    [

                        [
                            'text' => 'Providers',
                            'route' => 'admin.providers.index',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /* 'active' => ['admin/Management*'], */
                            /* 'can' => ['providers.index', 'providers.create', 'providers.edit', 'providers.delete'], */
                            'role' => ['Admin', 'System'],
                        ],

                        [
                            'text' => 'Supplies',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            'route' => 'admin.inventories.supplies.index',
                            /*  'active' => ['admin/Management*'], */
                            /*  'can' => ['providers.index', 'providers.create', 'providers.edit', 'providers.delete'], */
                            'role' => ['Admin', 'System'],
                        ],

                        [
                            'text' => 'Referrals',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            /*  'active' => ['admin/Management*'], */
                        ],

                        [

                            'text' => 'Storage',
                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                            'submenu' =>
                            [

                                [
                                    'text' => 'Storage movement',
                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                    /*  'active' => ['admin/Management*'], */
                                    'url' => '#',
                                ],
                                [
                                    'text' => 'Deliveries',
                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                    'submenu' => [
                                        [
                                            'text' => 'Shipping',
                                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                                            'route' => 'admin.inventories.delivery.validateReceived.index',
                                        ],
                                        [
                                            'text' => 'Reports',
                                            'icon' => 'fas fa-fw fa-horizontal-rule ',
                                            'submenu' => [
                                                [
                                                    'text' => 'Export Shipping data',
                                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                                    'route' => 'admin.inventories.delivery.export',
                                                    'active' => ['admin/Management*'],

                                                ],

                                                [
                                                    'text' => 'Import Shipping data',
                                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                                    'route' => 'donor.Reports.import',
                                                    'active' => ['admin/Management*'],

                                                ],
                                            ],

                                        ],
                                    ],

                                ],

                                [
                                    'text' => 'Transfers in warehouses',
                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                    'route' => 'admin.inventories.suppliesorder.index',

                                ],

                                [
                                    'text' => 'Request to warehouse',
                                    'icon' => 'fas fa-fw fa-horizontal-rule ',
                                    'route' => 'admin.inventories.warehouses.index',
                                    /* 'active' => ['admin/Management*'], */
                                ],
                            ],
                        ],
                    ],

                ],
            ],

        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
     */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
     */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
     */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
     */

    'livewire' => true,
];
