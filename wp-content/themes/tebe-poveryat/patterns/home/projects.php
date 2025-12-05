<?php
/**
 * Title: Секция Проекты
 * Slug: tebe-poveryat/projects
 * Categories: posts
 * Description: Вывод списка проектов или достижений.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-base-background-color has-background" style="padding-top:60px;padding-bottom:60px">
    <!-- wp:heading -->
    <h2 class="wp-block-heading">Наши проекты</h2>
    <!-- /wp:heading -->
    <!-- wp:paragraph -->
    <p>Здесь можно отобразить последние или избранные проекты.</p>
    <!-- /wp:paragraph -->
    <!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"include":[],"inherit":true,"taxQuery":[]}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
            <!-- wp:post-title {"level":3} /-->
            <!-- wp:post-featured-image {"isLink":true} /-->
            <!-- wp:post-excerpt /-->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
