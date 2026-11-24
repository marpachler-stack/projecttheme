<?php
/**
 * Hero / Title and Key
 * Fields: title (text), subtitle (text), text (wysiwyg), key_image (image ID)
 */
$title    = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$text     = get_sub_field('text');
$img_id   = get_sub_field('key_image');

// Backwards-compatible field names for existing project highlight rows.
if (!$subtitle) {
  $subtitle = get_sub_field('summary');
}
if (!$img_id) {
  $img_id = get_sub_field('image');
}

$title    = $title ?: __('Ready to unlock the world of DnD?', 'textdomaintomodify');
$subtitle = $subtitle ?: __('Then click on the key!', 'textdomaintomodify');
?>
<article class="hero-title-and-key project-highlight">
  <div class="hero-title-and-key__copy project-highlight__copy">
    <?php if ($title): ?>
      <h1 class="hero-title-and-key__title project-highlight__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <p class="hero-title-and-key__subtitle project-highlight__summary"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="hero-title-and-key__text project-highlight__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>
  </div>

  <figure class="hero-title-and-key__key project-highlight__illustration">
    <?php if ($img_id): ?>
      <?php
      echo wp_get_attachment_image($img_id, 'large', false, [
        'class'    => 'hero-title-and-key__image project-highlight__image',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
      ?>
    <?php else: ?>
      <img
        class="hero-title-and-key__image project-highlight__image"
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dnd-key.svg'); ?>"
        alt=""
        loading="lazy"
        decoding="async"
      >
    <?php endif; ?>
  </figure>
</article>
