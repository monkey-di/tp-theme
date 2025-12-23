<?php
/**
 * Input with Button Component (Subscription style)
 *
 * @param array $args {
 * @type string $type Input type (email, text). Default 'text'.
 * @type string $name Input name.
 * @type string $placeholder Input placeholder.
 * @type string $button_text Button label.
 * @type string $state State: 'default', 'disabled', 'error'. Default 'default'.
 * }
 */

$type = $args['type'] ?? 'text';
$name = $args['name'] ?? 'input';
$placeholder = $args['placeholder'] ?? '';
$button_text = $args['button_text'] ?? 'Отправить';
$state = $args['state'] ?? 'default';
$classes = $args['classes'] ?? '';
$placeholder_position = $args['placeholder_position'] ?? 'placeholder-shown:text-center';
$button_id = $args['button_id'] ?? '';
$input_id = $args['input_id'] ?? '';
// Base Wrapper Classes
$wrapper_classes = 'w-full pl-4 pr-1 py-1 rounded-[20px] flex justify-between items-center transition-colors duration-300';

// Base Input Classes
$input_classes = 'flex-grow bg-transparent border-none outline-none text-base font-normal font-geologica leading-6  placeholder-shown:justify-start w-full ' . $placeholder_position;

// State Logic
switch ($state) {
    case 'disabled':
        $wrapper_classes .= ' bg-primary/20 cursor-not-allowed';
        $input_classes .= ' text-contrast opacity-40 placeholder-[#6063a6] placeholder-opacity-60';
        $is_disabled = 'disabled';
        break;
    case 'error':
        $wrapper_classes .= ' bg-white outline outline-1 outline-secondary';
        $input_classes .= ' text-secondary placeholder-[#6063a6] placeholder-opacity-60';
        $is_disabled = '';
        break;
    default: // default / focus
        $wrapper_classes .= ' bg-white focus-within:outline focus-within:outline-1 focus-within:outline-primary';
        $input_classes .= ' text-contrast placeholder-[#6063a6] placeholder-opacity-60'; // Changed from text-primary
        $is_disabled = '';
        break;
}

$input_classes .= $classes;
?>

<div class="<?php
echo esc_attr($wrapper_classes); ?>">
    <input
            type="<?php
            echo esc_attr($type); ?>"
            name="<?php
            echo esc_attr($name); ?>"
            placeholder="<?php
            echo esc_attr($placeholder); ?>"
            class="<?php
            echo esc_attr($input_classes); ?>"
            <?php
            if ($input_id) echo 'id="' . esc_attr($input_id) . '" '; ?>
            <?php
            echo $is_disabled; ?>
    >

    <button type="submit"
            <?php
            if ($button_id) echo 'id="' . esc_attr($button_id) . '" '; ?>
            class="h-12 px-5 py-4 bg-secondary rounded-[20px] flex justify-center items-center gap-3 hover:bg-secondary/80 transition duration-300 flex-shrink-0" <?php
    echo $is_disabled; ?>>
        <span class="text-white text-[13px] font-normal font-geologica uppercase leading-5">
            <?php
            echo esc_html($button_text); ?>
        </span>
    </button>
</div>
