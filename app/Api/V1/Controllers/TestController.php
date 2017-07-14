<?php
/**
 * Created by PhpStorm.
 * User: jince
 * Date: 2017/6/30
 * Time: 17:20
 */
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\User;

class TestController extends BaseController
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response->errorBadRequest();
    }
}