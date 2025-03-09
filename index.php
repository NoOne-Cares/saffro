<?php
// //**
// *Main template file
// @pakage safroo
// *
// */

get_header();
?>
<div id="primary">
    <main id="main" class="site-main " role="main">
        <?php
        if (is_home() && !is_front_page()) {
            ?>
            <header class="mb-5">
                <h1 class="page-title">
                    <?php single_post_title(); ?>
                </h1>
            </header>
            <?php
        }
        ?>
        <?php
        if (have_posts()) {
            ?>
            <div class="container">
                <?php
                while (have_posts()):
                    the_post();
                    the_title();
                    the_content();
                endwhile;
        }
        ?>
        </div>

        <div class="bg-amber-100">asdhfkjahsdkjfh</div>


    </main>
</div>
<?php
get_footer();
