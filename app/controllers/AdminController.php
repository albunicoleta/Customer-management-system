<?php

class AdminController extends BaseController {

    /**
     * create save action for login
     */
    public function postLogin()
    {
        $input = Input::only('username', 'password');
        if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            /* @todo redirect to a proper route */
            return Redirect::intended('admin/dashboard');
        }
        
        return Redirect::intended('/admin');
    }

}
