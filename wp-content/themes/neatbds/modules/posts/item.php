<article class="post-item">
    <a href="<?php echo the_permalink();?>" class="latest_news__item">
        <?php if (has_post_thumbnail()) : ?>
            <div class="latest_news__item__image"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?></div>
        <?php endif; ?>
        <div class="latest_news__item__cont">
            <div class="latest_news__item__date"><?php echo get_the_date(); ?></div>
            <div class="latest_news__item__title h3"><?php the_title(); ?></div>
        </div>
    </a>
</article>

