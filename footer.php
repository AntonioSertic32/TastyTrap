<!-- Footer -->
        <footer>
            <div class="container" style="clear: both;">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <?php dynamic_sidebar('footer-sidebar1'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <?php dynamic_sidebar('footer-sidebar2'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <?php dynamic_sidebar('footer-sidebar3');?>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="copyright text-muted">Copyright &copy; Tasty Trap <?php echo date("Y.") ?></p>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
