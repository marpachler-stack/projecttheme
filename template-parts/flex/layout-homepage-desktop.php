<?php
/**
 * Homepage / Desktop
 * Fields: title (text), text (wysiwyg), key_image (image ID),
 *         background_image (image ID)
 */
$title  = get_sub_field('title');
$text   = get_sub_field('text');
$img_id = get_sub_field('key_image');
$bg_id  = get_sub_field('background_image');
$style  = '';

if ($bg_id) {
  $bg_url = wp_get_attachment_image_url($bg_id, 'full');
  if ($bg_url) {
    $style = ' style="background-image:url(' . esc_url($bg_url) . ');background-size:cover;background-position:center;"';
  }
}

$title = $title ?: __('Welcome to the world of DnD!', 'textdomaintomodify');
?>
<div class="homepage-desktop"<?php echo $style; ?>>
  <article class="homepage-desktop__panel">
    <?php if ($title): ?>
      <h1 class="homepage-desktop__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="homepage-desktop__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>

    <figure class="homepage-desktop__key">
      <?php if ($img_id): ?>
        <?php
        echo wp_get_attachment_image($img_id, 'large', false, [
          'class'    => 'homepage-desktop__key-image',
          'loading'  => 'lazy',
          'decoding' => 'async',
        ]);
        ?>
      <?php else: ?>
        <img
          class="homepage-desktop__key-image"
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dnd-key.svg'); ?>"
          alt=""
          loading="lazy"
          decoding="async"
        >
      <?php endif; ?>
    </figure>
  </article>

  <nav class="homepage-desktop__nav" aria-label="<?php esc_attr_e('Page sections', 'textdomaintomodify'); ?>">
    <span class="homepage-desktop__nav-item"></span>
    <span class="homepage-desktop__nav-item"></span>
    <span class="homepage-desktop__nav-item"></span>
  </nav>
</div>
