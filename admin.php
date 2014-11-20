<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newTest':
    newTest();
    break;
  case 'editTest':
    editTest();
    break;
  case 'deleteTest':
    deleteTest();
    break;
  default:
    listTests();
}


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | Widget News";

  if ( isset( $_POST['login'] ) ) {

    // Пользователь получает форму входа: попытка авторизировать пользователя

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

      // Вход прошел успешно: создаем сессию и перенаправляем на страницу администратора
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );

    } else {

      // Ошибка входа: выводим сообщение об ошибке для пользователя
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }

  } else {

    // Пользователь еще не получил форму: выводим форму
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }

}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}


function newTest() {

  $results = array();
  $results['pageTitle'] = "New Test";
  $results['formAction'] = "newTest";

  if ( isset( $_POST['saveChanges'] ) ) {

    // Пользователь получает форму редактирования статьи: сохраняем новую статью
    $test = new Test;
    $test->storeFormValues( $_POST );
    $test->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // Пользователь сбросид результаты редактирования: возвращаемся к списку статей
    header( "Location: admin.php" );
  } else {

    // Пользователь еще не получил форму редактирования: выводим форму
    $results['test'] = new Test;
    require( TEMPLATE_PATH . "/admin/editTest.php" );
  }

}


function editTest() {

  $results = array();
  $results['pageTitle'] = "Edit Test";
  $results['formAction'] = "editTest";

  if ( isset( $_POST['saveChanges'] ) ) {

    // Пользователь получил форму редактирования статьи: сохраняем изменения

    if ( !$test = Test::getById( (int)$_POST['testId'] ) ) {
      header( "Location: admin.php?error=testNotFound" );
      return;
    }

    $test->storeFormValues( $_POST );
    $test->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // Пользователь отказался от результатов редактирования: возвращаемся к списку статей
    header( "Location: admin.php" );
  } else {

    // Пользвоатель еще не получил форму редактирования: выводим форму
    $results['test'] = Test::getById( (int)$_GET['testId'] );
    require( TEMPLATE_PATH . "/admin/editTest.php" );
  }

}


function deleteTest() {

  if ( !$test = Test::getById( (int)$_GET['testId'] ) ) {
    header( "Location: admin.php?error=testNotFound" );
    return;
  }

  $test->delete();
  header( "Location: admin.php?status=testDeleted" );
}


function listTests() {
  $results = array();
  $data = Test::getList();
  $results['tests'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Tests";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "testNotFound" ) $results['errorMessage'] = "Error: Test not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "testDeleted" ) $results['statusMessage'] = "Test deleted.";
  }

  require( TEMPLATE_PATH . "/admin/listTests.php" );
}

?>
