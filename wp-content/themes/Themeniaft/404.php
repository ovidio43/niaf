<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="main-container">
    <div class="main clearfix">
		<div class="primary">
            <h1>Not found <span>:(</span></h1>
            <p>Sorry, but the page you were trying to view does not exist.</p>
            <p>It looks like this was the result of either:</p>
            <ul>
                <li>a mistyped address</li>
                <li>an out-of-date link</li>
            </ul>
            <script>
                var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2),GOOG_FIXURL_SITE = location.host;
            </script>
            <script src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>
        </div>
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->


<?php get_footer(); ?>