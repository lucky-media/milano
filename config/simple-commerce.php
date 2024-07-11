<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sites
    |--------------------------------------------------------------------------
    |
    | You may configure a different currency & different shipping methods for each
    | of your 'multi-site' sites.
    |
    | https://simple-commerce.duncanmcclean.com/multi-site
    |
    */

    'sites' => [
        'default' => [
            'currency' => 'USD',

            'shipping' => [
                'methods' => [
                    \DuncanMcClean\SimpleCommerce\Shipping\FreeShipping::class => [],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Gateways
    |--------------------------------------------------------------------------
    |
    | This is where you configure the payment gateways you wish to use across
    | your site. You may configure as many as you like.
    |
    | https://simple-commerce.duncanmcclean.com/gateways
    |
    */

    'gateways' => [
        \DuncanMcClean\SimpleCommerce\Gateways\Builtin\StripeGateway::class => [
            'key' => env('STRIPE_KEY'),
            'secret' => env('STRIPE_SECRET'),
            'mode' => 'card_elements',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Simple Commerce is able to send notifications after certain 'events' happen,
    | like an order being marked as paid. You may configure these notifications
    | below.
    |
    | https://simple-commerce.duncanmcclean.com/notifications
    |
    */

    'notifications' => [
        'order_paid' => [
            \DuncanMcClean\SimpleCommerce\Notifications\CustomerOrderPaid::class   => ['to' => 'customer'],
            \DuncanMcClean\SimpleCommerce\Notifications\BackOfficeOrderPaid::class => ['to' => 'duncan@example.com'],
        ],

        'order_shipped' => [
            \DuncanMcClean\SimpleCommerce\Notifications\CustomerOrderShipped::class   => ['to' => 'customer'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Stock Running Low
    |--------------------------------------------------------------------------
    |
    | Simple Commerce will emit events when stock is running low for a product.
    | You may configure the threshold used to decide 'when' a product is
    | running low.
    |
    | https://simple-commerce.duncanmcclean.com/stock
    |
    */

    'low_stock_threshold' => 10,

    /*
    |--------------------------------------------------------------------------
    | Tax
    |--------------------------------------------------------------------------
    |
    | Configure the 'tax engine' you'd like to be used to calculate tax rates
    | throughout your site.
    |
    | https://simple-commerce.duncanmcclean.com/tax
    |
    */

    'tax_engine' => \DuncanMcClean\SimpleCommerce\Tax\Standard\TaxEngine::class,

    'tax_engine_config' => [
        // Basic Engine
        'rate'               => 20,
        'included_in_prices' => false,

        // Standard Tax Engine
        'address' => 'billing',

        'behaviour' => [
            'no_address_provided' => 'default_address',
            'no_rate_available' => 'prevent_checkout',
        ],

        'default_address' => [
            'address_line_1' => '',
            'address_line_2' => '',
            'city' => '',
            'region' => '',
            'country' => '',
            'zip_code' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Drivers
    |--------------------------------------------------------------------------
    |
    | Normally, all products/orders/etc are stored as entries. However, as your
    | store grows you may which to use a database instead. This is where you
    | come to switch out the 'entry driver' for the 'database driver'.
    |
    | https://simple-commerce.duncanmcclean.com/extending/content-drivers
    |
    */

    'content' => [
        'orders' => [
            'collection' => 'orders',
            'repository' => \DuncanMcClean\SimpleCommerce\Orders\EntryOrderRepository::class,
        ],

        'products' => [
            'collection' => 'products',
            'repository' => \DuncanMcClean\SimpleCommerce\Products\EntryProductRepository::class,
        ],

        'coupons' => [
            'collection' => 'coupons',
            'repository' => \DuncanMcClean\SimpleCommerce\Coupons\EntryCouponRepository::class,
        ],

        'customers' => [
            'collection' => 'customers',
            'repository' => \DuncanMcClean\SimpleCommerce\Customers\EntryCustomerRepository::class,
        ],
    ],
    'field_whitelist' => [
        'orders' => [
            'shipping_name',
            'shipping_address',
            'shipping_address_line2',
            'shipping_city',
            'shipping_region',
            'shipping_postal_code',
            'shipping_country',
            'use_shipping_address_for_billing',
            'billing_name',
            'billing_address',
            'billing_address_line2',
            'billing_city',
            'billing_region',
            'billing_postal_code',
            'billing_country',
            'gateway',
            'shipping_method',
            'meta',
            'seo_title',
            'seo_meta_description',
            'seo_custom_meta_title',
            'seo_custom_meta_description',
            'seo_canonical',
            'seo_og_description',
            'seo_og_title',
            'seo_custom_og_title',
            'seo_custom_og_desc',
            'seo_tw_title',
            'seo_tw_description',
            'seo_custom_tw_title',
            'seo_custom_tw_desc',
            'seo_og_image',
        ],
        'line_items' => [],
        'customers' => [
            'title',
            'name',
            'email',
            'slug',
            'meta',
            'seo_title',
            'seo_meta_description',
            'seo_custom_meta_title',
            'seo_custom_meta_description',
            'seo_canonical',
            'seo_og_description',
            'seo_og_title',
            'seo_custom_og_title',
            'seo_custom_og_desc',
            'seo_tw_title',
            'seo_tw_description',
            'seo_custom_tw_title',
            'seo_custom_tw_desc',
            'seo_og_image',
        ],
    ],

];
