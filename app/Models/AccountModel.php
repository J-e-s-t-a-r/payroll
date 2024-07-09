<?php
namespace App\Models;
use CodeIgniter\Model;

final class AccountModel extends Model
{
    protected $table = 'user';
    protected $allowFields = [
    'username',
    'password'
    ];
}
