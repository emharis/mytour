<?php

namespace App\Controllers\Admin;

class UserController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.user.index', array('users' => \User::all()));
    }

    function getNew() {
        $gsels = \App\Models\Group::all();
        $groupsel = array();
        foreach ($gsels as $gs) {
            $groupsel[$gs->id] = $gs->name;
        }
        return \View::make('admin.user.new', array('groupsel' => $groupsel));
    }

    function postNew() {


        \DB::transaction(function() {
            //create new user
            $user = new \Toddish\Verify\Models\User();
            $user->username = \Input::get('username');
            $user->password = \Input::get('password');
            $user->verified = 1;
            $user->disabled = \Input::get('enabled');
            $user->save();
            //register role to new user
            $user->roles()->sync(array(\Input::get('group')));
        });

        return \Redirect::to('admin/user');
    }

}
