<?php

return [
    'required'  => 'حقل :attribute مطلوب.',
    'email'     => 'يرجى إدخال بريد إلكتروني صحيح.',
    'min'       => [
        'string' => 'يجب أن يكون :attribute على الأقل :min أحرف.',
    ],
    'max'       => [
        'string' => 'يجب ألا يتجاوز :attribute :max أحرف.',
    ],
    'unique'    => 'هذا :attribute مستخدم بالفعل.',
    'exists'    => 'قيمة :attribute غير صالحة.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'after'     => 'يجب أن يكون :attribute تاريخاً بعد :date.',
    'attributes' => [
        'email'    => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'name'     => 'الاسم',
    ],
];
