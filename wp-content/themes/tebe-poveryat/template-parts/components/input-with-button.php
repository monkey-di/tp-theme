<?php
/**
 * Input with Button Component (Subscription style)
 *
 * @param array $args {
 *     @type string $type        Input type (email, text). Default 'text'.
 *     @type string $name        Input name.
 *     @type string $placeholder Input placeholder.
 *     @type string $button_text Button label.
 *     @type string $state       State: 'default', 'disabled', 'error'. Default 'default'.
 * }
 */

$type        = $args['type'] ?? 'text';
$name        = $args['name'] ?? 'input';
$placeholder = $args['placeholder'] ?? '';
$button_text = $args['button_text'] ?? 'Отправить';
$state       = $args['state'] ?? 'default';

// Base Wrapper Classes
$wrapper_classes = 'w-full pl-4 pr-1 py-1 rounded-[20px] flex justify-between items-center transition-colors duration-300';

// Base Input Classes
$input_classes = 'flex-grow bg-transparent border-none outline-none text-base font-normal font-geologica leading-6 placeholder-shown:text-center placeholder-shown:justify-start w-full';

// State Logic
switch ( $state ) {
    case 'disabled':
        $wrapper_classes .= ' bg-primary/20 cursor-not-allowed';
        $input_classes   .= ' text-contrast opacity-40 placeholder-contrast/40';
        $is_disabled      = 'disabled';
        break;
    case 'error':
        $wrapper_classes .= ' bg-white outline outline-1 outline-secondary';
        $input_classes   .= ' text-secondary placeholder-secondary';
        $is_disabled      = '';
        break;
    default: // default / focus
        $wrapper_classes .= ' bg-white focus-within:outline focus-within:outline-1 focus-within:outline-primary';
        $input_classes   .= ' text-primary placeholder-primary/40';
        $is_disabled      = '';
        break;
}
?>

<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
    <input 
        type="<?php echo esc_attr( $type ); ?>" 
        name="<?php echo esc_attr( $name ); ?>" 
        placeholder="<?php echo esc_attr( $placeholder ); ?>" 
        class="<?php echo esc_attr( $input_classes ); ?>"
        <?php echo $is_disabled; ?>
    >
    
    <button type="submit" class="h-12 px-5 py-4 bg-primary/60 rounded-[20px] flex justify-center items-center gap-3 hover:bg-primary transition duration-300 flex-shrink-0" <?php echo $is_disabled; ?>>
        <span class="text-white text-[13px] font-normal font-geologica uppercase leading-5">
            <?php echo esc_html( $button_text ); ?>
        </span>
    </button>
</div>
