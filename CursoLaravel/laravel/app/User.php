<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model {
    public function set_email( $string ) {
        $this->set_attribute('email', $string );
    }    
    public function set_realname( $string ) {
        $this->set_attribute('realname', $string );
    }    
    public function set_password( $string ) {
        $this->set_attribute('password', Hash::make($string) );
    }
}
/*

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';


    protected $fillable = ['name', 'email', 'password'];


    protected $hidden = ['password', 'remember_token'];
}
*/