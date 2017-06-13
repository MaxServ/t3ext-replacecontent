<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Replace Content',
    'description' => 'Search and replace strings after page generation using regular expressions.',
    'category' => 'fe',
    'state' => 'stable',
    'author' => 'Michiel Roos',
    'author_email' => 'michiel@maxserv.com',
    'version' => '2.0.4',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.6-8.7.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ],
    'autoload' => [
        'psr-4' => [
            'MaxServ\\Replacecontent\\' => 'Classes'
        ]
    ],
    'autoload-dev' => [
        'psr-4' => [
            'MaxServ\\Replacecontent\\Tests\\' => 'Tests'
        ]
    ]
];
