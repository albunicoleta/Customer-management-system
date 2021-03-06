<?php

/**
 * controller for admin
 */
class AdminController extends BaseController {

    /**
     * create save action for login
     */
    public function postLogin()
    {
        $input = Input::only('username', 'password');
        if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            return Redirect::intended('admin/dashboard');
        }
        return Redirect::to('/admin')->with('login-failed',true);
    }

}
