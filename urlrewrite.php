<?php
$arUrlRewrite=array (
  9 => 
  array (
    'CONDITION' => '#^/people_ask/([^/]+?)/\\??(.*)#',
    'RULE' => 'ELEMENT_CODE=$1&$2',
    'ID' => 'seologica:catalog.element',
    'PATH' => '/people_ask/detail.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/company/([^/]+?)/\\??(.*)#',
    'RULE' => 'ELEMENT_CODE=$1&$2',
    'ID' => 'seologica:catalog.element',
    'PATH' => '/company/detail.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/sitemap.xml#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/sitemap.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/robots.txt#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/robots.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/tenders/#',
    'RULE' => '',
    'ID' => 'seologica:catalog',
    'PATH' => '/tenders/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/#',
    'RULE' => '',
    'ID' => 'seologica:catalog',
    'PATH' => '/objects/index.php',
    'SORT' => 100,
  ),
);
