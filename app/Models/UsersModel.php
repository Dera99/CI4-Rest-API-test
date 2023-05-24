<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['username', 'email', 'password', 'profile'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'username' => 'required|is_unique[users.username]',
        'email' => 'required|valid_email',
        'password' => 'required|min_length[8]'
    ];
    protected $validationMessage = [
        'username' => 'username tidak boleh kosong / sudah terpakai',
        'email' => 'email tidak valid',
        'password' => 'password tidak boleh kosong / kurang dari 8 character'
    ];
}
