<?php
namespace App\Auth;

// Eloquent is used as a standalone ORM, without Laravel's Application or Kernel.
abstract class Account extends \Illuminate\Database\Eloquent\Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}
