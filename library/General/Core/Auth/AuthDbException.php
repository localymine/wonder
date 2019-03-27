<?php
/**
 * handles unusual behavior during user authentication process.
 * ユーザー認証処理中の例外処理を行う
 */
namespace General\Core\Auth;


/**
 * exception that occurred during database collation.
 * データベース照合中に発生したものを処理する認証プロセス例外
 *
 * @package Coolrevo\Smc\Auth
 */
class AuthDbException extends \Phalcon\Exception
{

}

