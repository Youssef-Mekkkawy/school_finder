<?php

return [
    'required'  => 'The :attribute field is required.',
    'email'     => 'Please enter a valid email address.',
    'min'       => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'max'       => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'unique'    => 'This :attribute is already taken.',
    'exists'    => 'The selected :attribute is invalid.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'after'     => 'The :attribute must be a date after :date.',
    'attributes' => [
        'email'    => 'email',
        'password' => 'password',
        'name'     => 'name',
    ],
];
