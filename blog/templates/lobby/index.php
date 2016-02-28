<?php require_once __DIR__ . "/../../../load.php";$GLOBALS['workspaceHTML'] = "";\Lobby\Router::dispatch();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title><?php echo($page_title); ?></title>
        <?php echo isset($page_meta) ? $page_meta : ""; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        get_header();
        \Lobby::doHook("head.begin");
        \Lobby::head();
        \Lobby::doHook("head.end");
        ?>
        <link rel="stylesheet" href="<?php echo($template_dir_url); ?>style.css">
        <link rel="stylesheet" href="<?php echo($template_dir_url); ?>subdiv.css">
    </head>

    <body>
        <?php \Lobby::doHook("body.begin");?>
        <?php if($is_home) { ?>
        <article>
            <div class="row">
                <div class="one-quarter meta">
                    <div class="thumbnail">
                        <img src="<?php echo get_twitter_profile_img($blog_twitter); ?>" alt="profile" />
                    </div>
        
                    <ul>
                        <li><?php echo($blog_title); ?></li>
                        <li><a href="mailto:<?php echo($blog_email); ?>?subject=Hello"><?php echo($blog_email); ?></a></li>
                        <li></li>
                    </ul>
                </div>
        
                <div class="three-quarters post">
                    <h2><?php echo($intro_title); ?></h2>
        
                    <p><?php echo($intro_text); ?></p>
        
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </article>
        <?php } ?>
        
        <?php echo($content); ?>
        
        <?php
        //get_footer();
        require_once APPS_DIR . "/lobby-server/src/inc/views/track.php";
        ?>
    </body>
</html>
