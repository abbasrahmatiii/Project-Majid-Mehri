<?php


return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => "مرکز روان شناسی هرم", // عنوان پیش‌فرض سایت
            'description' => 'توضیحات پیش‌فرض سایت که باید جذاب و شامل کلمات کلیدی اصلی باشد.', // توضیحات پیش‌فرض سایت
            'separator' => ' - ',
            'keywords' => ['کلیدواژه اول', 'کلیدواژه دوم', 'کلیدواژه سوم'], // کلیدواژه‌های پیش‌فرض
            'canonical' => null, // URL کانونیکال پیش‌فرض
            'robots' => 'index, follow', // تنظیمات ربات‌ها
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => 'کد تأیید گوگل',
            'bing' => 'کد تأیید بینگ',
            'alexa' => 'کد تأیید الکسا',
            'pinterest' => 'کد تأیید پینترست',
            'yandex' => 'کد تأیید یاندکس',
        ],

        'add_notranslate_class' => true, // اضافه کردن کلاس notranslate به تگ HTML
    ],

    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'سایت من', // عنوان پیش‌فرض Open Graph
            'description' => 'توضیحات پیش‌فرض سایت که باید جذاب و شامل کلمات کلیدی اصلی باشد.', // توضیحات پیش‌فرض Open Graph
            'url' => null, // URL پیش‌فرض Open Graph
            'type' => 'website', // نوع پیش‌فرض Open Graph
            'site_name' => 'سایت من', // نام سایت پیش‌فرض Open Graph
            'images' => [], // تصاویر پیش‌فرض Open Graph
        ],
    ],

    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary_large_image', // نوع کارت توییتر
            'site' => '@your_twitter_username', // نام کاربری توییتر سایت
        ],
    ],

    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'سایت من', // عنوان پیش‌فرض JSON-LD
            'description' => 'توضیحات پیش‌فرض سایت که باید جذاب و شامل کلمات کلیدی اصلی باشد.', // توضیحات پیش‌فرض JSON-LD
            'url' => null, // URL پیش‌فرض JSON-LD
            'type' => 'WebPage', // نوع پیش‌فرض JSON-LD
            'images' => [], // تصاویر پیش‌فرض JSON-LD
        ],
    ],
];
