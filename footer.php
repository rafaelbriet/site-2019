</main><!-- .site-content -->

<footer class="site-footer">
    <div class="site-footer-center">
    <nav class="social-links">
        
        <?php
            $behance = esc_html( get_option( 'behance_url' ) );
            $facebook = esc_html( get_option( 'facebook_url' ) );
            $github = esc_html( get_option( 'github_url' ) );
            $instagram = esc_html( get_option( 'instagram_url' ) );
            $linkedin = esc_html( get_option( 'linkedin_url' ) );
            $twitter = esc_html( get_option( 'twitter_url' ) );

            if ($behance) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no Behance"><i class="fab fa-behance"></i></a>', $behance);
            }

            if ($facebook) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no Facebook"><i class="fab fa-facebook-f"></i></a>', $facebook);
            }

            if ($github) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no GitHub"><i class="fab fa-github"></i></a>', $github);
            }

            if ($instagram) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no Instagram"><i class="fab fa-instagram"></i></a>', $instagram);
            }

            if ($linkedin) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no LinkedIn"><i class="fab fa-linkedin-in"></i></a>', $linkedin);
            }

            if ($twitter) {
                printf('<a href="%s" rel="noopener" target="_blank" class="social-icons" title="Meu perfil no Twitter"><i class="fab fa-twitter"></i></a>', $twitter);
            }
        ?>

    </nav>
    </div><!-- .site-footer-center -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>