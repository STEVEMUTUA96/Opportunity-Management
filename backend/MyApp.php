<?php



namespace app;

/**
 * Description of MyApp
 *
 * @author user
 */
class MyApp extends \Aviator implements MyAppI
{
    /**
     *
     * @param type $arrayParams
     * @return type
     */

 
    public function addAccounts($arrayParams)
    {
        ##name, address, city, phone,date
        $name = self::Av_sanitize($arrayParams['name']);
        $address = self::Av_sanitize($arrayParams['address']);
        $city = self::Av_sanitize($arrayParams['city']);
        $phone = self::Av_sanitize($arrayParams['phone']);

        $sql = "INSERT INTO account(name,address,city,phone) VALUES('$name','$address','$city','$phone')";
        $res = self::Av_ExecSql($sql, 'Done');
        return self::getResponse(!$res['error'], $res);
    }

    /**
     *
     * @param type $arrayParams
     * @return type
     */
    public function addOpportunity($arrayParams)
    {
        //accountid, title,amount, stage, date;

        $accountId = self::Av_sanitize($arrayParams['accountid']);
        $title = self::Av_sanitize($arrayParams['title']);
        $amount = self::Av_sanitize($arrayParams['amount']);
        $stage = self::Av_sanitize($arrayParams['stage']);

        $sql =
            'INSERT INTO accopportunities(accountid, title,amount, stage)' .
            " VALUES('$accountId','$title','$amount','$stage')";

        $res = self::Av_ExecSql($sql, 'Done');
        return self::getResponse(!$res['error'], $res);
    }

    /**
     *
     * @param type $arrayParams
     * @return type
     */
    public function deleteOpportunity($arrayParams)
    {
        $id = self::Av_sanitize($arrayParams['id']);
        $sql = "DELETE FROM accopportunities WHERE id='$id'";
        $res = self::Av_ExecSql($sql, 'Done');
        return self::getResponse(!$res['error'], $res);
    }

    /**
     *
     * @param type $arrayParams
     * @return type
     */
    public function editOpportunity($arrayParams)
    {
        $id = self::Av_sanitize($arrayParams['id']);
        $title = self::Av_sanitize($arrayParams['title']);
        $amount = self::Av_sanitize($arrayParams['amount']);
        $stage = self::Av_sanitize($arrayParams['stage']);

        $sql =
            "UPDATE accopportunities SET title='$title',amount='$amount', stage='$stage'" .
            " WHERE id='$id'";

        $res = self::Av_ExecSql($sql, 'Done');
        return self::getResponse(!$res['error'], $res);
    }

    /**
     *
     * @return type
     */
    public function getAccounts()
    {
        $sql = 'SELECT * FROM account ORDER BY id DESC';
        return self::Av_GetMultiRowsData($sql);
    }

    /**
     *
     * @return type
     */
    public function getOpportunities()
    {
        $sql =
            'SELECT * FROM accopportunities, account WHERE accopportunities.accountid=account.id GROUP BY accopportunities.date ORDER BY accopportunities.id DESC';
        return self::Av_GetMultiRowsData($sql);
    }

    public function init()
    {
    }

    /**
     *
     * @param type $arrayPrams
     * @return type
     */
    public function userLogin($arrayPrams)
    {
        $username = self::Av_sanitize($arrayPrams['username']);
        $pass = self::Av_sanitize($arrayPrams['password']);

        $sql = "SELECT * FROM users WHERE username='$username' AND pwd='$pass'";

        $data = self::Av_GetRowDataDB($sql);

        if (!is_null($data)) {
            return self::getResponse(true, $data);
        }

        return self::getResponse(false, 'Invalid credentials');
    }

    /**
     *
     * @param type $arrayPrams
     * @return type
     */
    public function userRegister($arrayPrams)
    {
        $username = self::Av_sanitize($arrayPrams['username']);
        $pass = self::Av_sanitize($arrayPrams['password']);

        $sql = "INSERT INTO users(username,pwd) VALUES('$username','$pass')";

        $res = self::Av_ExecSql($sql, 'Successfully registered');
        return self::getResponse(!$res['error'], $res);
    }

    /**
     *
     * @param type $issuccess
     * @param type $data
     * @return type
     */
    public static function getResponse($issuccess, $data = null)
    {
        return ['success' => $issuccess, 'data' => $data];
    }

    /**
     *
     * @param type $data
     */
    public static function print($data)
    {
        die(json_encode($data));
    }
}
