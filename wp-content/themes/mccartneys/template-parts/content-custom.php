<div class="col-12 col-md-6 col-lg-4">
    <div class="post-item">
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid" alt="<?php the_title(); ?>">
            </a>
        </div>
    <?php endif; ?>
    <div class="post-content">
        
        <div class="category-date">
            <span class="ca-post-badge">
                <?php $category = get_the_category(); echo $category[0]->name; ?>
            </span>
            <span class="date"><?php echo get_the_date(); ?></span>
        </div>
        <h4 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
    </div>
    </div>
</div>
