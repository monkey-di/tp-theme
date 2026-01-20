jQuery(document).ready(function($) {
    // Инициализация для кастомных постов
    function initAjaxCustomPosts($container) {
        const $wrapper = $container.find('.bloglist-wrapper');
        const $btn = $container.find('.load-more-btn');
        const $sort = $container.find('.sort-select');
        const $spinner = $btn.find('.spinner');

        // Установка начальных значений
        $sort.val($container.data('sort'));
        updateCustomButtonState($container);

        // Событие сортировки
        $sort.on('change', function() {
            const newSort = $(this).val();
            $container.data('sort', newSort);
            $container.data('paged', 1);

            $btn.hide();
            $wrapper.html('<div class="loading">Загрузка...</div>');

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'load_more_custom_posts',
                    nonce: ajax_object.nonce,
                    paged: 0, // Сбрасываем на первую страницу
                    post_type: $container.data('post-type'),
                    sort: newSort,
                    per_page: $container.data('perpage'),
                    taxonomy: $container.data('taxonomy'),
                    term: $container.data('term'),
                    meta_key: $container.data('meta-key'),
                    meta_value: $container.data('meta-value')
                },
                success: function(response) {
                    if (response.success) {
                        $wrapper.html(response.data.html);
                        $container.data('paged', 1);
                        updateCustomButtonState($container);
                    } else {
                        $wrapper.html('<p class="error">Ошибка загрузки</p>');
                    }
                },
                error: function() {
                    $wrapper.html('<p class="error">Ошибка загрузки</p>');
                }
            });
        });

        // Загрузка постов
        $btn.on('click', function(e) {
            e.preventDefault();
            if ($(this).hasClass('disabled') || $(this).hasClass('loading')) return;

            const currentPage = parseInt($container.data('paged'));

            $spinner.show();
            $btn.addClass('loading');

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
                        // Удаляем старые данные и сообщение "нет постов"
                        $wrapper.find('.posts-data, .no-posts-found').remove();

                        // Добавляем новые посты
                        const $newContent = $(response.data.html);
                        $wrapper.append($newContent);

                        // Обновляем состояние
                        $container.data('paged', response.data.paged);
                        updateCustomButtonState($container);
                    }
                },
                error: function() {
                    $spinner.hide();
                    $btn.removeClass('loading');
                    alert('Произошла ошибка при загрузке');
                }
            });
        });
    }

    // Обновление состояния кнопки для кастомных постов
    function updateCustomButtonState($container) {
        const $btn = $container.find('.load-more-btn');
        const $data = $container.find('.posts-data');

        if ($data.length) {
            try {
                const data = JSON.parse($data.html());
                if (data.has_more) {
                    $btn.show().removeClass('disabled');
                } else {
                    $btn.hide().addClass('disabled');
                }
            } catch (e) {
                $btn.hide();
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