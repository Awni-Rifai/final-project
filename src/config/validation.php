<?php

use Illuminate\Validation\Rules\Password;

return[
    'PASSWORD'=> [
        'required',
        'confirmed',
        Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()


    ],

];
