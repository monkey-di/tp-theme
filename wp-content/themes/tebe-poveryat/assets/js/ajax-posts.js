jQuery(document).ready(function($) {
    // Инициализация для кастомных постов
    function initAjaxCustomPosts($container) {
        const $wrapper = $container.find('.bloglist-wrapper');
        const $btn = $container.find('.load-more-btn');
        const $sort = $container.find('.sort-select');

        // Установка начальных значений
        $sort.val($container.data('sort'));
        updateCustomButtonState($container);

        // Событие сортировки
        $sort.on('change', function() {
            $container.data('sort', $(this).val());
            $container.data('paged', 1);

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'load_more_custom_posts',
                    nonce: ajax_object.nonce,
                    paged: 0,
                    post_type: $container.data('post-type'),
                    sort: $(this).val(),
                    per_page: $container.data('perpage'),
                    taxonomy: $container.data('taxonomy'),
                    term: $container.data('term'),
                    meta_key: $container.data('meta-key'),
                    meta_value: $container.data('meta-value')
                },
                beforeSend: function() {
                    $wrapper.html('<div class="loading">Загрузка...</div>');
                    $btn.hide();
                },
                success: function(response) {
                    if (response.success) {
                        $wrapper.html(response.data.html);
                        $container.data('paged', 1);
                        updateCustomButtonState($container);
                    }
                }
            });
        });

        // Загрузка постов
        $btn.on('click', function(e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const currentPage = parseInt($container.data('paged'));
            const $spinner = $(this).find('.spinner');

            $spinner.show();
            $(this).addClass('loading');

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'load_more_custom_posts',
                    nonce: ajax_object.nonce,
                    paged: currentPage,
                    post_type: $container.data('post-type'),
                    sort: $container.data('sort'),
                    per_page: $container.data('perpage'),
                    taxonomy: $container.data('taxonomy'),
                    term: $container.data('term'),
                    meta_key: $container.data('meta-key'),
                    meta_value: $container.data('meta-value')
                },
                success: function(response) {
                    $spinner.hide();
                    $btn.removeClass('loading');

                    if (response.success) {
                        // Удаляем старые данные JSON
                        $wrapper.find('.posts-data').remove();

                        // Разбиваем ответ на отдельные элементы
                        const $newContent = $(response.data.html);

                        // Находим все article элементы в ответе
                        const $articles = $newContent.filter('article');
                        const $jsonData = $newContent.filter('.posts-data');

                        // Добавляем только article элементы
                        $articles.each(function() {
                            $wrapper.append($(this));
                        });

                        // Добавляем JSON данные
                        if ($jsonData.length) {
                            $wrapper.append($jsonData);
                        }

                        // Обновляем состояние
                        $container.data('paged', response.data.paged);
                        updateCustomButtonState($container);
                    }
                },
                error: function() {
                    $spinner.hide();
                    $btn.removeClass('loading');
                }
            });
        });
    }

    // Обновление состояния кнопки для кастомных постов
    function updateCustomButtonState($container) {
        const $btn = $container.find('.load-more-btn');
        const $data = $container.find('.posts-data');

        if ($data.length) {
            const data = JSON.parse($data.text() || $data.html());
            if (data.has_more) {
                $btn.show().removeClass('disabled');
            } else {
                $btn.hide().addClass('disabled');
            }
        } else {
            $btn.hide();
        }
    }

    // Инициализация всех контейнеров с кастомными постами
    $('.ajax-custom-posts-container').each(function() {
        initAjaxCustomPosts($(this));
    });
});