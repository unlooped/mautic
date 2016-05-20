<?php

return array(
    'name'        => 'Points Change Listenter',
    'description' => 'Listen for points change and duplicate points value to lead_score field.',
    'version'     => '1.0',
    'author'      => 'Serenity',


    'services'    => array(
        'events' => array(
            'mautic.points.pointschange.subscriber' => array(
                'class' => 'MauticPlugin\MauticPointsBundle\EventListener\PointsChangeSubscriber'
            )
        ),
    ),

);