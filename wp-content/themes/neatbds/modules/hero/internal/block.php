<?php
/**
 * Simple Hero
 *
 * Title:       Internal
 * Description: Simple hero
 * Category:    neatbds_hero
 * Icon:        align-full-width
 * Keywords:    hero
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package neatbds
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

do_action('neatbds_pre_render_block', $block);
?>
<section class="hero-internal" id="<?php echo $block['id']; ?>">
  <div class="container">
    <div class="hero_simple__text-cont">
      <div class="breadcrumb">
        <?php //get_breadcrumb();   ?>
      </div>
      <?php
      echo ($title = get_field('title')) ? '<h1 class="hero_simple__title">' . $title . '</h1>' : '';
      echo ($text = get_field('text')) ? '<div class="hero_simple__text">' . $text . '</div>' : '';
      ?>
    </div>
  </div>
</section>
