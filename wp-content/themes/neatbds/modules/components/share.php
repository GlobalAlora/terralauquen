<div class="social-share">
    <a class="social-share__facebook"
        href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"
        title="<?php __('Share on Facebook', 'neatbds'); ?>" target="_blank" rel="noreferrer noopener"
        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"
        target="_blank"><i class="fab fa-facebook-square"></i></a>
    <a class="social-share__twitter"
        href="https://twitter.com/intent/tweet?source=<?php the_permalink(); ?>&text=:%20<?php the_permalink(); ?>"
        target="_blank" rel="noreferrer noopener" title="<?php __('Share on Twitter', 'neatbds'); ?>"
        onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i
            class="fab fa-twitter-square"></i></a>
    <a class="social-share__email" href="mailto:?subject=&body=:%20<?php the_permalink(); ?>" target="_blank"
        rel="noreferrer noopener" title="<?php __('Share via Email', 'neatbds'); ?>"
        onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><i
            class="far fa-envelope"></i></a>
    <a class="social-share__linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source="
        target="_blank" rel="noreferrer noopener" title="<?php __('Share on Linkedin', 'neatbds'); ?>"
        onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i
            class="fab fa-linkedin"></i></a>
</div>
