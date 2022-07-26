<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Webman\Route;

//测试
Route::any('/api.test', [app\controller\api\Index::class,'index']);
//登录
Route::post('/api.user.login', [app\controller\api\Login::class, 'login']);
//用户信息
Route::post('/api.user.info', [app\controller\api\Login::class, 'userInfo']);