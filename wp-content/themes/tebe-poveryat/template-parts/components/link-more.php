<?php
/**
 * Link "Read More" Component
 *
 * @param array $args {
 *     @type string $text        Link text.
 *     @type string $url         Link URL.
 *     @type string $style       'hero' (Akrobat Bold XL) or 'default' (Geologica Normal Base). Default 'default'.
 *     @type string $class       Additional CSS classes.
 * }
 */

$text  = $args['text'] ?? 'Читать далее';
$url   = $args['url'] ?? '#';
$style = $args['style'] ?? 'default';
$class = $args['class'] ?? '';

$text_classes = '';
$icon_classes = 'w-6 h-6 transition-transform duration-300 group-hover:translate-x-1 flex-shrink-0 flex items-center justify-center';

switch ($style) {
    case 'hero':
        $text_classes = 'text-primary text-xl font-bold font-akrobat leading-5';
        break;
    case 'default':
    default:
        $text_classes = 'text-primary text-base font-normal font-geologica leading-6';
        break;
}
?>

<div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer <?php echo esc_attr( $class ); ?>">
    <a href="<?php echo esc_url( $url ); ?>" class="inline-flex justify-start items-center gap-3 no-underline">
        <!-- Icon -->
        <div class="<?php echo esc_attr( $icon_classes ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3V15H16.175L12.575 18.575L14 20L20 14L13.975 7.975L12.575 9.4L16.175 13H7V3H5Z" fill="currentColor" class="text-primary"/>
            </svg>
        </div>
        <!-- Text -->
        <div class="<?php echo esc_attr( $text_classes ); ?>">
            <?php echo esc_html( $text ); ?>
        </div>
    </a>
    <!-- Underline -->
    <div class="self-stretch h-0 outline outline-2 outline-offset-[-1px] outline-primary transition-opacity duration-300 group-hover:opacity-0"></div>
</div>