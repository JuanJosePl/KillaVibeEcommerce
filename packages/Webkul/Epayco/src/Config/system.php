<?php

return [
    [
        'key'    => 'sales.payment_methods.epayco',
        'name'   => 'Epayco',
        'info'  => 'Epayco Payment Gateway',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'title',
                'title'         => 'Nombre',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'name_store',
                'title'         => 'Nombre de la tienda',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'url_response',
                'title'         => 'URL de respuesta',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'url_confirmation',
                'title'         => 'URL de confirmación',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'description',
                'title'         => 'Descripción',
                'type'          => 'textarea',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'cust_id_client',
                'title'         => 'Cust Id Client',
                'type'          => 'text',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'p_key',
                'title'         => 'P key',
                'type'          => 'text',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'public_key',
                'title'         => 'Public Key',
                'type'          => 'text',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'image',
                'title'         => 'admin::app.configuration.index.sales.payment-methods.logo',
                'type'          => 'image',
                'info'          => 'admin::app.configuration.index.sales.payment-methods.logo-information',
                'channel_based' => false,
                'locale_based'  => false,
                'validation'    => 'mimes:bmp,jpeg,jpg,png,webp',
            ],
            [
                'name'          => 'active',
                'title'         => 'Estado',
                'type'          => 'boolean',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ],
            [
                'name'          => 'testing_mode',
                'title'         => 'Modo pruebas',
                'type'          => 'boolean',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ]
        ]
    ]
];
