<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm extends Form
{
    public function __construct($attributes)
    {
        if (!Validator::string($attributes['password'], 5, INF)) {
            $this->errors['body'] = 'password cannot be shorter than 5 characters';
        }

        if (!Validator::string($attributes['email'])) {
            $this->errors['body'] = 'email cannot be shorter than 5 characters';
        }
    }
}