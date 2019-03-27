<?php
/**
 * handles unusual behavior during user authentication process.
 * ユーザー認証処理中の例外処理を行う
 */
namespace General\Core\Auth;


/**
 * exception that handles suspected Brute Force attacks.
 * Brute Force攻撃と疑われるアクセスを処理する認証プロセス例外
 *
 * @package Coolrevo\Smc\Auth
 */
class AuthBfaException extends \Phalcon\Exception
{

}
