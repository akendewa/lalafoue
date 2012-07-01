<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $title_for_layout; ?> -  lalafou&eacute; par Akendewa
        </title>
        <?php

            echo $this->Html->css(array(
                'bootstrap.min',                
                'admin.css'
                )
            );

            echo $this->Html->script(
                array(
                    'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
                ),
                array('block' => 'jquery')
            );
            echo $this->Html->script(
                array(
                    'bootstrap.min',
                ),
                array('block' => 'scripts')
            );

            echo $this->Html->meta('icon');


            echo $this->fetch('meta');
            echo $this->fetch('css');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            if (!isset($description_for_layout)) {
                $description_for_layout = 'civhistoire';
            }
            if (!isset($image_for_layout)) {
                $image_for_layout = Router::url('/img/square-logo.jpg');
            }
        ?>
        <meta name="description" content="<?php echo $description_for_layout ?>">
        <meta name="author" content="Regis Bamba">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <meta property="og:image" content="<?php echo $image_for_layout ?>" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo Router::url('/img/square-logo.jpg')?>">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                     <a class="brand" href="<?php echo Router::url('/') ?>">
                            <i class="icon-pencil icon-white"></i> <span class="logo-civ">civ</span><span class="logo-blogs">histoire</span>
                     </a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo Router::url('/') ?>">
                                    Accueil
                                </a>
                            </li>
                            <?php if(isset($me) && ($me!=null)) : ?>
                            <li>
                                <?php
                                    echo $this->Html->link($me['username'], '#');
                                ?>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Administration <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php
                                            echo $this->Html->link(__('Events', true), array('controller' => 'events', 'action' => 'index', 'admin' => false));
                                        ?>
                                    </li>                             
                                    <?php if($me['is_admin']) : ?>
                                    <li>
                                        <?php
                                            echo $this->Html->link(__('Users', true), array('controller' => 'users', 'action' => 'index', 'admin' => true));
                                        ?>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <?php
                                            echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout', 'admin' => false));
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <div id="container" class="container">
        <div class="row">
            <div class="span12">
                <?php echo $this->Session->flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="page-header">
                    <h1><?php echo $title_for_layout ?></h1>
                </div>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <hr>
                <p><strong>lalafou&eacute;</strong> est un projet <a href="https://github.com/akendewa/lalafoue">open source</a> r&eacute;alis&eacute; par les <a href="http://dev.akendewa.org">d&eacute;veloppeurs b&eacute;n&eacute;voles</a> d'Akendewa.</p>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <?php echo $this->element('sql_dump'); ?>
            </div>
        </div>
    </div> <!-- /container -->
    <!-- Scripts -->
        <?php
            echo $this->fetch('jquery');
        ?>
        <script>window.jQuery || document.write('<script src="<?php echo Router::url('/js/jquery.min.js'); ?>"><\/script>')</script>
        <?php
            echo $this->fetch('scripts');
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.dropdown-toggle').dropdown()
            });
        </script>
        <script type="text/javascript">

             var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '']);
            _gaq.push(['_trackPageview']);

            (function() {
               var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
               ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>

