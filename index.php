<?php

require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'viewTest':
    viewTest();
    break;
  default:
    homepage();
}

function archive() {
  $results = array();
  $data = Test::getList();
  $results['tests'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Article Archive | Widget News";
  require( TEMPLATE_PATH . "/archive.php" );
}

function viewTest() {
  if ( !isset($_GET["testId"]) || !$_GET["testId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['test'] = Test::getById( (int)$_GET["testId"] );
  $results['pageTitle'] = $results['test']->title . " | Widget News";
  require( TEMPLATE_PATH . "/viewTest.php" );
}

function homepage() {
  $results = array();
  $data = Test::getList( HOMEPAGE_NUM_ARTICLES );
  $results['tests'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Widget News";
  require( TEMPLATE_PATH . "/homepage.php" );
}

?>
