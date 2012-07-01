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
                'basic',
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
                    'jquery.simplemodal.1.4.2.min.js',
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
            <div id="logo">Lalafou&eacute;</div>
            <div id="slogan">Les faits et &eacute;v&egrave;nements marquants de l'histoire de la C&ocirc;te d'Ivoire</div>
            <div id="buttons"><a href="#" onclick="$('#about').modal(); return false;">A propos</a> | <a target="_blank" href="http://www.akendewa.org/projets/contribuez-a-mettre-lhistoire-de-la-cote-divoire-en-ligne/">Contribuer</a></div>

            <div id="about" style="display : none">
                <p>
                    Lalafou&eacute; est un projet open source de l'ONG <a href="http://www.akendewa.org">Akendewa</a>, dont le but est d'&eacute;tablir une frise chronologique de l'histoire de la C&ocirc;te d'Ivoire.
                </p>
                <p>De nombreux &eacute;v&egrave;nements ont marqu&eacute; l'histoire de notre beau pays, et Akendewa souhaite &agrave; travers <strong>lalafou&eacute;</strong> permettre au citoyen lambda d'en avoir connaissance.
                <p>
                    Lalafou&eacute; qui signifie <strong>Jadis</strong> en Baoul&eacute;, est aussi un projet communautaire : les donn&eacute;s sont recolt&eacute;es par des volontaires et sont aussi disponibles au grand public par le biais d'une API.
                </p>
                <p>Si vous souhaitez contribuer en ajoutant un &eacute;v&egrave;nement, veuillez remplir ce <a target="_blank" href="http://www.akendewa.org/projets/contribuez-a-mettre-lhistoire-de-la-cote-divoire-en-ligne/">formulaire</a> SVP.</p>
                <hr />
                <h2>Open Source</h2>
                <p>Le code source de <strong>lalafou&eacute;</strong> est disponible gratuitement en ligne. <a href="https://github.com/akendewa/lalafoue">https://github.com/akendewa/lalafoue</a>
                <hr />
                <h2>B&eacute;n&eacute;voles</h2>
                    <p>Ce projet est maintenu par cette &eacute;quipe de b&eacute;n&eacute;voles</p>
                    <ul>
                        <li><strong>Direction du projet: </strong> Jean-Patrick Ehouman</li>
                        <li><strong>Collection de donn&eacute;es : </strong>Deborah Soko, Christel Bouat&eacute;l&eacute;</li>
                        <li><strong>D&eacute;veloppement web & API : </strong> R&eacute;gis Bamba</li>
                    </ul>
                <hr />
                <h2>API</h2>
                <p>Les donn&eacute;es de lalafou&eacute; sont disponibles au grand public par le biais de son API. Les m&eacute;thodes suivantes sont disponibles :</p>                    
                <h3>Lister tous les &eacute;v&egrave;nements : </h3>
                <div>
                    <strong>http://lalafoue.akendewa.org/api/events/list.json</strong>
                </div>
                <div>
                <strong>http://lalafoue.akendewa.org/api/events/list.xml</strong>
                </div>
                <h3>Lire un &eacute;v&egrave;nements en particulier : </h3>
                <div>
                    <strong>http://lalafoue.akendewa.org/api/events/get/:id.json</strong>
                </div>
                <div>
                    <strong>http://lalafoue.akendewa.org/api/events/get/:id.xml</strong>
                </div>
                <p><strong>:id</strong> repr&eacute;sente l'ID num&eacute;rique de l'&eacute;v&egrave;nement en question</p>
                <h3>Effectuer une recherche :</h3>
                <div>
                    <strong>http://lalafoue.akendewa.org/api/events/search.json</strong>
                </div>                
                <div>
                    <strong>http://lalafoue.akendewa.org/api/events/search.xml</strong>
                </div>
                <div>Param&egrave;tres</div>
                <ul>
                    <li>start_date : Date du debut de l'evenement. (Exemple : 1960,8,7 => 7 Aout 1960)</li>
                    <li>end_date : Date de la fin de l'evenement. (Exemple : 2011,4,11 => 11 Avril 2011)</li>
                    <li>keyword : Mot Cl&eacute;</li>
                </ul>
            </div>
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
