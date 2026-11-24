<?php
/**
 * Project highlight
 * Fields: summary (text), title (text), text (wysiwyg), image (ID)
 */
$summary = get_sub_field('summary');
$text    = get_sub_field('text');
$img_id  = get_sub_field('image');
$title   = get_sub_field('title');
$title   = $title ?: __('Ready to unlock the world of DnD?', 'textdomaintomodify');
$summary = $summary ?: __('Then click on the key!', 'textdomaintomodify');
?>
<article class="project-highlight">
  <div class="project-highlight__copy">
    <?php if ($title): ?>
      <h2 class="project-highlight__title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($summary): ?>
      <p class="project-highlight__summary"><?php echo esc_html($summary); ?></p>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="project-highlight__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>
  </div>

  <figure class="project-highlight__illustration">
    <?php if ($img_id): ?>
      <?php
      echo wp_get_attachment_image($img_id, 'large', false, [
        'class'    => 'project-highlight__image',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
      ?>
    <?php else: ?>
      <img
        class="project-highlight__image"
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dnd-key.svg'); ?>"
        alt=""
        loading="lazy"
        decoding="async"
      >
    <?php endif; ?>
  </figure>
</article>
