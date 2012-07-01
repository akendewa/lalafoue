<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Regis Bamba">
        <meta name="description" content="">
        <title>
            <?php echo $title_for_layout; ?> - lalafou&eacute; par Akendewa
        </title>
        <?php

            echo $this->Html->css(array(
                'reset',
                'timeline.css',
                'application.css?1.1'
                )
            );

            echo $this->Html->script(
                array(
//                    'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
                ),
                array('block' => 'jquery')
            );
            echo $this->Html->script(
                array(
                    'timeline-min.js',
                    'locale/fr.js',
                ),
                array('block' => 'scripts')
            );

            echo $this->Html->meta('icon');


            echo $this->fetch('meta');
            echo $this->fetch('css');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:image" content="" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo Router::url('/img/square-logo.jpg')?>">
    </head>
    <body>
        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
        
        <!-- Scripts -->
        <?php
            echo $this->fetch('jquery');
        ?>
        <script>window.jQuery || document.write('<script src="<?php echo Router::url('/js/jquery.min.js'); ?>"><\/script>')</script>
        <?php
            echo $this->fetch('scripts');
        ?>
        <script>
            var timelineData = {};
            timelineData.timeline = {
                //'headline' : 'Histoire de la Cote d\'Ivoire',
                'type' : 'default',
                'startDate' : '1960,8,7',
                //'text' : 'Faits et evenements marquands de l\'histoire, de la cote d\'Ivoire',
                'date' : []
            };

            $(document).ready(function() {
                $.ajax({
                    url: '<?php echo Router::url('/api/events/list.json'); ?>'
                }).success(function(data) {
                    console.log(data);
                  // On verifie qu'on a bien recu la liste d'evenements du serveur.

                    if (undefined != data.events) {

                        // On prepare le JSON pour la timeline

                        var l = data.events.length;
                        for (var i = 0; i < l; i++) {

                            var event = data.events[i];
                            var timelineEventData = {};

                            timelineEventData.startDate = event.Event.start_date.replace("-",",");
                            if ( '' != event.Event.end_date) {
                                timelineEventData.endDate = event.Event.end_date.replace("-",",");                                
                            }
                            timelineEventData.headline = $("<div/>").html(event.Event.headline).text();
                            timelineEventData.text = $("<div/>").html(event.Event.description).text();

                            if (null != event.Asset.id) {
                                timelineEventData.asset = {};
                                timelineEventData.asset.media = event.Asset.media;
                                timelineEventData.asset.credit = $("<div/>").html(event.Asset.credit).text();
                                timelineEventData.asset.caption = $("<div/>").html(event.Asset.caption).text();
                            }
                            console.log(timelineEventData);
                            timelineData.timeline.date.push(timelineEventData);

                        }
                        
                        // Configuration pour la timeline

                        var timeline_config = {
                            width:          "100%",
                            height:         "100%",
                            start_at_end:   false,
                            hash_bookmark:  true,
                            lang:           'fr',
                        }

                        var timeline = new VMM.Timeline();
                        timeline.init(timelineData, 'timeline', timeline_config);        
        
                    }
                }).error(function(data) {
                    alert('Une erreur s\'est produite. Veuillez r&eacute;-actualiser la page, SVP.');
                }).done(function() {
                    $('.loading').remove();
                });
            });
        </script>
        <script type="text/javascript">
             var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '']);
            _gaq.push(['_trackPageview']);

            (function() {
//               var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
//               ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
//               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>
