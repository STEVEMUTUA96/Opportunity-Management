<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app;

/**
 * Description of MyAppI
 *
 * @author user
 */
interface MyAppI {

    function userLogin($arrayPrams);

    function userRegister($arrayParams);

    function addAccounts($arrayParams);

    function getAccounts();

    function addOpportunity($arrayParams);

    function editOpportunity($arrayParams);

    function deleteOpportunity($arrayParams);

    function getOpportunities();

    static function getResponse($issuccess, $data);

    static function print($data);
}
