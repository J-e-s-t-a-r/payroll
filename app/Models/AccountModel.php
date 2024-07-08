<?php
namespace App\Models;
use CodeIgniter\Model;

final class AccountModel extends Model
{
    protected $table = 'accounts';
    protected $allowFields = [
    'DILG_ID',
    'Name',
    'Position',
    'Salary'
    ];
}
