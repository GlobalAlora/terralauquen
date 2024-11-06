<article class="post-item">
    <a href="<?php echo the_permalink();?>" class="latest_news__item">
        <?php 
        $post_default_image = get_field('post_default_image', 'option');
        $post_image = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'medium') : '<img src="' . $post_default_image['url'] . '" alt="Terralauquen">';
        echo '<div class="latest_news__item__image">' . $post_image . '</div>';
        ?>
        <div class="latest_news__item__cont">
            <div class="latest_news__item__date"><?php echo get_the_date(); ?></div>
            <div class="latest_news__item__title h3"><?php the_title(); ?></div>
        </div>
    </a>
</article>

