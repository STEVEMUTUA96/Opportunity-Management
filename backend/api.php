<?php



header("Content-Type: application/json");

include_once './lib/BaseInterface.php';
include_once './MyAppI.php';
include_once './lib/Aviator.php';
include_once './MyApp.php';


define("userLogin", "userLogin");
define("userRegister", "userRegister");
define("addAccounts", "addAccounts");
define("getAccounts", "getAccounts");
define("addOpportunity", "addOpportunity");
define("editOpportunity", "editOpportunity");
define("deleteOpportunity", "deleteOpportunity");
define("getOpportunities", "getOpportunities");

$action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];

$app = new \app\MyApp();
switch ($action) {
    case userLogin:
        \app\MyApp::print($app->userLogin($_POST));
        break;
    case userRegister:
        \app\MyApp::print($app->userRegister($_POST));
        break;
    case addAccounts:
        \app\MyApp::print($app->addAccounts($_POST));
        break;
    case addOpportunity:
        \app\MyApp::print($app->addOpportunity($_POST));
        break;
    case editOpportunity:
        \app\MyApp::print($app->editOpportunity($_POST));
        break;
    case deleteOpportunity:
        \app\MyApp::print($app->deleteOpportunity($_POST));
        break;
    case getOpportunities:
        \app\MyApp::print($app->getOpportunities());
        break;
    case getAccounts:
        \app\MyApp::print($app->getAccounts());
        break;

    default:
        \app\MyApp::print(\app\MyApp::getResponse(false, "Unknown action"));
        break;
}
