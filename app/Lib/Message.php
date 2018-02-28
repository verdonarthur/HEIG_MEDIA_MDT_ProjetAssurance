<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 03.03.2016
 * Time: 16:40
 */

namespace App\Lib;

use Illuminate\Support\Facades\Session;

/**
 * Class Message
 * Define several helpers designed to flash specific named data on the Session.
 * The value of these data will be a custom message defined in the messages.php file.
 * Since the methods use the trans() helpers, the message value don't need to be translated manually.
 * @package App\Lib
 */
class Message
{
    /**
     * Flashes data named after $type on the Session.
     * The value of this data is a message identified with $name
     * and possibly containing as many placeholders as $placeholders.
     * Note : it's assumed that the desired message is located on the messages.php file
     * @param $data_name String the name of the flashed data
     * @param $reference String The identifier of the message to send
     * @param array|null $placeholders The placeholders to swap on the message
     */
    protected static function execute($data_name, $reference, Array $placeholders = null)
    {
        Session::flash($data_name, self::get($reference, $placeholders));
    }

    /**
     * Flashes data named 'success' on the Session.
     * The value of this data is a message identified with $name
     * and possibly containing as many placeholders as $placeholders
     * Note : it's assumed that the desired message is located on the messages.php file
     * @param $reference String name of the message to send
     * @param array $placeholders The placeholders to swap on the message
     */
    public static function success($reference, Array $placeholders = null)
    {
        self::execute('success', $reference, $placeholders);
    }

    /**
     * Flashes data named 'info' on the Session.
     * The value of this data is a message identified with $name
     * and possibly containing as many placeholders as $placeholders
     * Note : it's assumed that the desired message is located on the messages.php file
     * @param $reference String name of the message to send
     * @param array $placeholders The placeholders to swap on the message
     */
    public static function info($reference, Array $placeholders = null)
    {
        self::execute('info', $reference, $placeholders);
    }

    /**
     * Flashes data named 'warning' on the Session.
     * The value of this data is a message identified with $name
     * and possibly containing as many placeholders as $placeholders
     * Note : it's assumed that the desired message is located on the messages.php file
     * @param $reference String name of the message to send
     * @param array $placeholders The placeholders to swap on the message
     */
    public static function warning($reference, Array $placeholders = null)
    {
        self::execute('warning', $reference, $placeholders);
    }

    /**
     * Flashes data named 'error' on the Session.
     * The value of this data is a message identified with $name
     * and possibly containing as many placeholders as $placeholders
     * Note : it's assumed that the desired message is located on the messages.php file
     * @param $reference String name of the message to send
     * @param array $placeholders The placeholders to swap on the message
     */
    public static function error($reference, Array $placeholders = null)
    {
        self::execute('error', $reference, $placeholders);
    }

    /**
     * Returns a simple string message based on the given $ref.
     * This $ref must correspond to an existing message in the messages.php file
     * @param $reference String The reference to the message to send
     * @param array|null $placeholders The placeholders to swap on the message
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public static function get($reference, Array $placeholders = null)
    {
        if ($placeholders !== null) {
            return trans('messages.' . $reference, $placeholders);
        } else {
            return trans('messages.' . $reference);
        }
    }
}
