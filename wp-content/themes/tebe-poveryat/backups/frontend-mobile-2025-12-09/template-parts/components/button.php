<?php
/**
 * Button Component
 *
 * @param array $args {
 *     @type string $text        Button text.
 *     @type string $url         Link URL if the button is an anchor.
 *     @type string $style       'primary', 'secondary', 'white', 'outline-primary', 'outline-white', etc.
 *     @type string $size        'sm', 'md', 'lg'. Default 'md'.
 *     @type string $state       'default', 'disabled'. Default 'default'.
 *     @type string $class       Additional CSS classes.
 *     @type bool   $submit      True if button is type="submit". Default false.
 * }
 */

$text        = $args['text'] ?? 'Кнопка';
$url         = $args['url'] ?? '';
$style       = $args['style'] ?? 'primary';
$size        = $args['size'] ?? 'md';
$state       = $args['state'] ?? 'default';
$extra_class = $args['class'] ?? '';
$submit      = $args['submit'] ?? false;

$base_classes = 'inline-flex justify-center items-center gap-3 rounded-[40px] transition-colors duration-300 font-geologica uppercase leading-6 no-underline';
$text_classes = '';
$bg_classes   = '';
$border_classes = '';

// Size
switch ($size) {
    case 'sm':
        $base_classes .= ' px-3 py-2 text-[13px]';
        break;
    case 'lg':
        $base_classes .= ' px-8 py-5 text-xl';
        break;
    case 'md':
    default:
        $base_classes .= ' px-5 py-4 text-base'; // Default for the provided maket
        break;
}

// Style
switch ($style) {
    case 'primary':
        $bg_classes   = 'bg-primary hover:bg-white';
        $text_classes = 'text-white hover:text-primary';
        $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white hover:outline-primary';
        break;
    case 'primary-hover': // Click state from maket
        $bg_classes   = 'bg-white';
        $text_classes = 'text-primary';
        $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white'; // No border in maket, but good to keep consistency
        break;
    case 'secondary':
        $bg_classes   = 'bg-secondary hover:bg-white';
        $text_classes = 'text-white hover:text-secondary';
        $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white hover:outline-secondary';
        break;
    case 'outline-white':
        if ( 'disabled' === $state ) {
             $bg_classes   = 'bg-white/40';
             $text_classes = 'text-white/70';
             $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white';
        } else {
             $bg_classes   = 'bg-transparent hover:bg-white';
             $text_classes = 'text-white hover:text-primary';
             $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white';
        }
        break;
    case 'outline-primary':
        $bg_classes   = 'bg-transparent hover:bg-primary';
        $text_classes = 'text-primary hover:text-white';
        $border_classes = 'outline outline-1 outline-offset-[-1px] outline-primary';
        break;
    case 'white': // For buttons like "Смотреть все материалы" or "Все истории"
        $bg_classes   = 'bg-white hover:bg-gray-100';
        $text_classes = 'text-primary hover:text-primary-dark';
        $border_classes = ''; // No specific border
        break;
    case 'form-submit': // Submit button in footer subscription form
        $bg_classes   = 'bg-secondary hover:bg-secondary/80';
        $text_classes = 'text-white text-[13px]';
        $border_classes = '';
        $base_classes .= ' h-12'; // Specific height for this one
        break;
    default: // Primary default
        $bg_classes   = 'bg-primary hover:bg-white';
        $text_classes = 'text-white hover:text-primary';
        $border_classes = 'outline outline-1 outline-offset-[-1px] outline-white hover:outline-primary';
        break;
}

// Disabled State
if ( 'disabled' === $state ) {
    $bg_classes   = 'bg-primary/40';
    $text_classes = 'text-primary/60';
    $border_classes = ''; // No outline for disabled in maket
    $base_classes .= ' cursor-not-allowed pointer-events-none';
}

$final_classes = "$base_classes $bg_classes $text_classes $border_classes $extra_class";

if ( $url && 'disabled' !== $state ) {
    ?>
    <a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( $final_classes ); ?>">
        <?php echo esc_html( $text ); ?>
    </a>
    <?php
} else {
    ?>
    <button type="<?php echo $submit ? 'submit' : 'button'; ?>" class="<?php echo esc_attr( $final_classes ); ?>" <?php echo 'disabled' === $state ? 'disabled' : ''; ?>>
        <?php echo esc_html( $text ); ?>
    </button>
    <?php
}
