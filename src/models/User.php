<?php

namespace totalWebConnections\simpleBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'simpleBlog_users';
}
