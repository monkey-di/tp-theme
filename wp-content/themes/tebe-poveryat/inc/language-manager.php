<?php
/**
 * Language Manager for Theme
 *
 * Manages language switching between Russian and English
 */

// Get current language (from query parameter or session)
function tp_get_current_language() {
    // Check if language is set via URL parameter
    if ( isset( $_GET['lang'] ) ) {
        $lang = sanitize_text_field( $_GET['lang'] );
        if ( in_array( $lang, ['ru', 'en'], true ) ) {
            // Store in session
            if ( session_status() === PHP_SESSION_NONE ) {
                session_start();
            }
            $_SESSION['tp_language'] = $lang;
            return $lang;
        }
    }

    // Check session
    if ( session_status() === PHP_SESSION_NONE ) {
        session_start();
    }
    if ( isset( $_SESSION['tp_language'] ) ) {
        return $_SESSION['tp_language'];
    }

    // Default to Russian
    return 'ru';
}

// Get translated text based on current language
function tp_get_text( $key, $default_ru = '', $default_en = '' ) {
    $translations = tp_get_translations();
    $lang = tp_get_current_language();

    if ( isset( $translations[$key][$lang] ) ) {
        return $translations[$key][$lang];
    }

    // Fallback
    return $lang === 'en' ? $default_en : $default_ru;
}

// Get all translations
function tp_get_translations() {
    return [
        // Header
        'header.about_problem' => [
            'ru' => 'О проблеме',
            'en' => 'About Issue',
        ],
        'header.for_survivors' => [
            'ru' => 'Для переживших',
            'en' => 'For Survivors',
        ],
        'header.how_we_help' => [
            'ru' => 'Как мы помогаем',
            'en' => 'How We Help',
        ],
        'header.projects' => [
            'ru' => 'Проекты',
            'en' => 'Projects',
        ],
        'header.about_us' => [
            'ru' => 'О нас',
            'en' => 'About Us',
        ],
        'header.blog' => [
            'ru' => 'Блог',
            'en' => 'Blog',
        ],
        'header.donate' => [
            'ru' => 'Хочу помочь',
            'en' => 'I want to help',
        ],
        'header.ru' => [
            'ru' => 'RU',
            'en' => 'RU',
        ],
        'header.en' => [
            'ru' => 'ENG',
            'en' => 'ENG',
        ],

        // Footer
        'footer.projects' => [
            'ru' => 'Проекты',
            'en' => 'Projects',
        ],
        'footer.reports' => [
            'ru' => 'Отчеты',
            'en' => 'Reports',
        ],
        'footer.about_us' => [
            'ru' => 'О нас',
            'en' => 'About Us',
        ],
        'footer.details' => [
            'ru' => 'Реквизиты',
            'en' => 'Details',
        ],
        'footer.subscribe_text' => [
            'ru' => 'Подпишитесь на рассылку, чтобы не пропустить новости о нашей работе',
            'en' => 'Subscribe to our newsletter to stay updated on our work',
        ],
        'footer.subscribe_btn' => [
            'ru' => 'Подписаться',
            'en' => 'Subscribe',
        ],
        'footer.placeholder' => [
            'ru' => 'example@mail.com',
            'en' => 'example@mail.com',
        ],
        'footer.consent' => [
            'ru' => 'Я соглашаюсь на обработку моих <a href="#">персональных данных</a>',
            'en' => 'I agree to the processing of my <a href="#">personal data</a>',
        ],
        'footer.documents' => [
            'ru' => 'Уставные документы',
            'en' => 'Governing Documents',
        ],
        'footer.offer' => [
            'ru' => 'Публичная оферта',
            'en' => 'Public Offer',
        ],
        'footer.privacy' => [
            'ru' => 'Политика обработки персональных данных',
            'en' => 'Privacy Policy',
        ],
        'footer.copyright' => [
            'ru' => '© «Тебе поверят», 2025',
            'en' => '© "Tebe Poveryat", 2025',
        ],
        'footer.email' => [
            'ru' => 'verimtebe@gmail.com',
            'en' => 'verimtebe@gmail.com',
        ],

        // Mobile Menu
        'mobile_menu.about_problem' => [
            'ru' => 'О проблеме',
            'en' => 'About Issue',
        ],
        'mobile_menu.materials' => [
            'ru' => 'Материалы',
            'en' => 'Materials',
        ],
        'mobile_menu.survivors_stories' => [
            'ru' => 'Истории переживших',
            'en' => 'Survivors\' Stories',
        ],
        'mobile_menu.for_survivors' => [
            'ru' => 'Для переживших',
            'en' => 'For Survivors',
        ],
        'mobile_menu.for_adults' => [
            'ru' => 'Взрослым',
            'en' => 'For Adults',
        ],
        'mobile_menu.for_parents' => [
            'ru' => 'Если с ребенком случилась беда',
            'en' => 'If Something Happened to Your Child',
        ],
        'mobile_menu.for_teens' => [
            'ru' => 'Подросткам',
            'en' => 'For Teens',
        ],
        'mobile_menu.how_we_help' => [
            'ru' => 'Как мы помогаем',
            'en' => 'How We Help',
        ],
        'mobile_menu.psychological_help' => [
            'ru' => 'Психологическая помощь',
            'en' => 'Psychological Support',
        ],
        'mobile_menu.legal_help' => [
            'ru' => 'Юридическая помощь',
            'en' => 'Legal Support',
        ],
        'mobile_menu.group_support' => [
            'ru' => 'Групповое направление',
            'en' => 'Group Support',
        ],
        'mobile_menu.projects' => [
            'ru' => 'Проекты',
            'en' => 'Projects',
        ],
        'mobile_menu.about_us' => [
            'ru' => 'О нас',
            'en' => 'About Us',
        ],
        'mobile_menu.governing_docs' => [
            'ru' => 'Учредительные документы',
            'en' => 'Governing Documents',
        ],
        'mobile_menu.team' => [
            'ru' => 'Команда',
            'en' => 'Team',
        ],
        'mobile_menu.reports' => [
            'ru' => 'Отчеты',
            'en' => 'Reports',
        ],
        'mobile_menu.partnership' => [
            'ru' => 'Сотрудничество',
            'en' => 'Partnership',
        ],
        'mobile_menu.blog' => [
            'ru' => 'Блог',
            'en' => 'Blog',
        ],

        // Sticky Help Button
        'sticky_help.text' => [
            'ru' => 'Обратиться за помощью',
            'en' => 'Get Help',
        ],
    ];
}

// Get language URL (for language switcher links)
function tp_get_language_url( $lang ) {
    $url = add_query_arg( 'lang', $lang );
    return $url;
}

// Check if current page is English version
function tp_is_english() {
    return tp_get_current_language() === 'en';
}
