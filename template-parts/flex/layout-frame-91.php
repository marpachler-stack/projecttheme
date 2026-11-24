<?php
/**
 * Frame 91
 * Fields: title (text), text (wysiwyg), key_image (image ID),
 *         background_image (image ID)
 */
$title   = get_sub_field('title');
$text    = get_sub_field('text');
$img_id  = get_sub_field('key_image');
$bg_id   = get_sub_field('background_image');
$style   = '';

if ($bg_id) {
  $bg_url = wp_get_attachment_image_url($bg_id, 'full');
  if ($bg_url) {
    $style = ' style="background-image:url(' . esc_url($bg_url) . ');background-size:cover;background-position:center;"';
  }
}

$title = $title ?: __('Welcome to the world of DnD!', 'textdomaintomodify');
?>
<section class="frame-91" aria-label="<?php echo esc_attr($title); ?>"<?php echo $style; ?>>
  <div class="frame-91__card">
    <?php if ($title): ?>
      <h1 class="frame-91__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="frame-91__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>

    <figure class="frame-91__key">
      <?php if ($img_id): ?>
        <?php
        echo wp_get_attachment_image($img_id, 'large', false, [
          'class'    => 'frame-91__key-image',
          'loading'  => 'lazy',
          'decoding' => 'async',
        ]);
        ?>
      <?php else: ?>
        <img
          class="frame-91__key-image"
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dnd-key.svg'); ?>"
          alt=""
          loading="lazy"
          decoding="async"
        >
      <?php endif; ?>
    </figure>
  </div>

  <div class="frame-91__menu" aria-hidden="true">
    <span class="frame-91__menu-mark"></span>
    <span class="frame-91__menu-mark"></span>
    <span class="frame-91__menu-mark"></span>
    <span class="frame-91__menu-mark"></span>
  </div>
</section>
