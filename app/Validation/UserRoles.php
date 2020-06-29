<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRoles{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new UserModel();
        $user = $model->where('email',$data['email'])
                        ->first();
        $user = $model->where('password',$data['password'])
                        ->first();
    
        if($user)
            return true;
        
        return password_verify($data['password'],$user['password']);
    }
}

// we need go to file set validation