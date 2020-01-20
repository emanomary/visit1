<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'             => 'يجب قبول :attribute.',
    'active_url'           => ':attribute لا يُمثّل رابطًا صحيحًا.',
    'after'                => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash'           => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط.',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة.',
    'before'               => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max.',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false .',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'date'                 => ':attribute ليس تاريخًا صحيحًا.',
    'date_equals'          => 'يجب أن يكون :attribute مطابقاً للتاريخ :date.',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with'            => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'exists'               => 'القيمة المحددة :attribute غير موجودة.',
    'file'                 => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'               => ':attribute إجباري.',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر.',
    ],
    'image'                => 'يجب أن يكون :attribute صورةً.',
    'in'                   => ':attribute غير موجود.',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر.',
    ],
    'not_in'               => 'العنصر :attribute غير صحيح.',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا.',
    'present'              => 'يجب تقديم :attribute.',
    'regex'                => 'صيغة :attribute .غير صحيحة.',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط.',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط.',
    ],
    'starts_with'          => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string'               => 'يجب أن يكون :attribute نصًا.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا.',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded'             => 'فشل في تحميل الـ :attribute.',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة.',
    'uuid'                 => ':attribute يجب أن يكون بصيغة UUID سليمة.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'site_name' => [
            'required' => 'حقل اسم الموقع مطلوب',
            'string' => 'يجب أن يكون اسم الموقع  نص',
            'max' => 'يجب ألا يزيد طول اسم الموقع عن 100 حرف',
            'min' => 'يجب ألا يقل طول اسم الموقع عن 10 حروف'
        ],
        'phone_no' => [
            'required' => 'حقل الهاتف مطلوب',
            'numeric' => 'يجب ان يكون الهاتف رقم',
            'digits_between' => 'يجب أن يكون الهاتف بين 7 إلى 9 أرقام'
        ],
        'address' => [
            'required' => 'حقل العنوان مطلوب',
            'string' => 'يجب أن يكون العنوان نص',
            'max' => 'يجب ألا يزيد طول  العنوانعن 100 حرف',
            'min' => 'يجب ألا يقل طول االعنوان عن 10 حروف'
        ],
        'category_name' => [
            'required' => 'حقل  اسم التصنيف مطلوب',
            'string' => 'يجب أن يكون اسم التصنيف نص',
            'max' => 'يجب ألا يزيد طول  اسم التصنيف عن 100 حرف',
            'unique' => 'التصنيف موجود مسبقا'
        ],
        'edit_category_name' => [
            'required' => 'حقل  اسم التصنيف مطلوب',
            'string' => 'يجب أن يكون اسم التصنيف نص',
            'max' => 'يجب ألا يزيد طول  اسم التصنيف عن 100 حرف',
            'unique' => 'التصنيف موجود مسبقا'
        ],
        'title' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب ان يكون عنوان المقال نص',
            'min' => 'يجب ألا يقل طول العنوان عن 4 حروف',
            'unique' => ':attribute موجود مسبقا'
        ],
        'details' => [
            'required' => 'حقل تفاصيل المقال مطلوب',
            'string' => 'يجب ألا يقل طول تفاصيل المقال عن 20 حرف',
            'min' => 'يجب ألا يقل طول العنوان عن 4 حروف'
        ],
        'category_id' => [
            'required' => ':attribute مطلوب'
        ],
        'start_date' => [
            'required' => 'حقل :attribute مطلوب',
            'date' => 'يجب أن يكون :attribute تاريخ'
        ],
        'end_date' => [
            'required' => 'حقل :attribute مطلوب',
            'date' => 'يجب أن يكون :attribute تاريخ'
        ],
        'image' => [
            'image' => 'يجب ان يكون :attribute عبارة عن صورة',
            'mimes'  => 'يجب أن يكون ملفًا من نوع : :values.',
            'max' => 'يجب ألا يزيد حجم الصورة عن 2048'
        ],
        'prog_image' => [
            'image' => 'يجب ان يكون :attribute عبارة عن صورة',
            'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
            'max' => 'يجب ألا يزيد حجم الصورة عن 2048'
        ],
        'pres_image' => [
            'image' => 'يجب ان يكون :attribute عبارة عن صورة',
            'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
            'max' => 'يجب ألا يزيد حجم الصورة عن 2048'
        ],
        'about' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب أن يكون :attribute نص',
            'min' => 'يجب ألا يقل طول نص :attribute عن 20 حرف'
        ],
        'family_program' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب أن يكون :attribute نص',
            'min' => 'يجب ألا يقل طول نص :attribute عن 20 حرف'
        ],
        'presenter_name' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب أن يكون :attribute نص',
            'min' => 'يجب ألا يقل طول نص :attribute عن 4 حروف'
        ],
        'program_type' => [
            'required' => ':attribute مطلوب',
            'numeric' => 'يجب أن يكون :attribute رقم',
        ],
        'duration' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب أن يكون :attribute نص',
        ],
        'program_cycle_id' => [
            'required' => ':attribute مطلوب',
        ],
        'prog_file' => [
            'required' => ':attribute مطلوب',
            'mimes'  => 'يجب أن يكون ملفًا من نوع : :values.',
            'file' => 'يجب أن يكون :attribute ملف صوتي'
        ],
        'program_id' => [
            'required' => ':attribute مطلوب',
        ],
        'visitor_name' => [
            'required' => ':attribute مطلوب',
            'min' => 'يجب ألا يقل طول :attribute عن 4 حروف',
            'string' => 'يجب أن بكون :attribute عبارة عن نص' 
        ],
        'visit_goal' => [
            'required' => ':attribute مطلوب',
            'min' => 'يجب ألا يقل طول :attribute عن 10 حروف',
            'string' => 'يجب أن بكون :attribute عبارة عن نص' 
        ],
        'start_time' => [
            'required' => ':attribute مطلوب',
        ],
        'end_time' => [
            'required' => ':attribute مطلوب',
        ],
        'job' => [
            'required' => ':attribute مطلوب',
            'string' => 'يجب أن يكون :attribute نص',
            'min' => 'يجب ألا يقل طول :attribute عن 5 حروف'
        ],
        'visit_date' => [
            'required' => ':attribute مطلوب',
            'date' => 'يجب أن يكون :attribute تاريخ'
        ],

    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'phone_no'              => 'الهاتف',
        'site_name'             => 'اسم الموقع',
        'category_name'         => 'اسم التصنيف',
        'edit_category_name'         => 'اسم التصنيف',
        'details'               => 'تفاصيل المقال',
        'category_id'           => 'التصنيف',
        'start_date'            => 'تاريخ بداية الدورة',
        'end_date'              => 'تاريخ نهاية الدورة',
        'image'                 => 'الصورة ',
        'mimes'                 => 'نوع الصورة',
        'prog_image'            => 'صورة البرنامج',
        'pres_image'            => 'صورة مقدم البرنامج',
        'about'                 => 'عن البرنامج',
        'family_program'        => 'اسرة البرنامج',
        'presenter_name'        => 'اسم مقدم البرنامج',
        'program_type'          => 'نوع البرنامج',
        'program_cycle_id'      => 'دورة البرنامج',
        'duration'              => 'مدة البرنامج',
        'prog_file'             => 'ملف الصوت',
        'program_id'            => 'البرنامج',
        'day_id'                => 'اليوم',
        'start'                 => 'وقت بداية البرنامج',
        'repeat'                => 'حالة البرنامج',
        'visitor_name'            => 'اسم الزائر',
        'visit_goal'            => 'هدف الزيارة',
        'start_time'            => 'وقت الزيارة',
        'end_time'              => 'وقت نهاية الزيارة',
        'job'                   => 'المسمى الوظيفي',
        'visit_date'            => 'تاريخ الزيارة'
    ],
];