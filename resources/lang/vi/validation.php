<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ có thể chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'numeric' => ':attribute phải ở giữa :min và :max.',
        'file' => ':attribute phải ở giữa :min và :max kilobytes.',
        'string' => ':attribute phải ở giữa :min và :max characters.',
        'array' => ':attribute phải có giữa :min và :max items.',
    ],
    'boolean' => ':attribute phải là true hoặc false.',
    'confirmed' => ':attribute nhận đinh không phù hợp.',
    'date' => ':attribute không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là một ngày bằng :date.',
    'date_format' => ':attribute không phù hợp với định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute cần phải có :digits chữ số.',
    'digits_between' => ':attribute phải ở giữa :min và :max chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute có giá trị trùng lặp.',
    'email' => ':attribute phải la một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong những điều sau đây: :values',
    'exists' => 'đã chọn :attribute là không hợp lệ.',
    'file' => ':attribute phải là một tập tin',
    'filled' => ':attribute phải có một giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute mphải lớn hơn :value characters.',
        'array' => ':attribute phải lớn hơn :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value characters.',
        'array' => ':attribute phải có :value items nhiều hơn.',
    ],
    'image' => ':attribute phải là một hình ảnh',
    'in' => 'đã chọn :attribute là không hợp lệ.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn :value characters.',
        'array' => ':attribute phải nhỏ hơn :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value characters.',
        'array' => ':attribute phải nhỏ hơn hoặc bằng :value items.',
    ],
    'max' => [
        'numeric' => ':attribute không thể lớn hơn :max.',
        'file' => ':attribute không thể lớn hơn :max kilobytes.',
        'string' => ':attribute không thể lớn hơn :max characters.',
        'array' => ':attribute không thể lớn hơn :max items.',
    ],
    'mimes' => ':attribute phải là một loại tệp: :values.',
    'mimetypes' => ':attribute phải là một loại tệp: :values.',
    'min' => [
        'numeric' => ':attribute ít nhất phải là :min.',
        'file' => ':attribute ít nhất phải là :min kilobytes.',
        'string' => ':attribute ít nhất phải là :min characters.',
        'array' => ':attribute ít nhất phải là :min items.',
    ],
    'not_in' => 'đã chọn :attribute là không hợp lệ.',
    'not_regex' => ':attribute định dạng không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'present' => ':attribute phải có mặt',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => ':attribute là bắt buộc.',
    'required_if' => ':attribute là bắt buộc khi :other là :value.',
    'required_unless' => 'Trường :attribute là bắt buộc trừ khi :other trong :values.',
    'required_with' => 'Trường :attribute là bắt buộc khi :values có giá trị',
    'required_with_all' => 'Trường :attribute là bắt buộc khi :values có giá trị',
    'required_without' => 'Trường :attribute là bắt buộc khi :values không có giá trị',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có giá trị nào của :values tồn tại.',
    'same' => ':attribute và :other phải giống nhau',
    'size' => [
        'numeric' => ':attribute phải chứa :size chữ số.',
        'file' => ':attribute phải chứa :size kilobytes.',
        'string' => ':attribute phải chứa :size characters.',
        'array' => ':attribute phải chứa :size items.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng một trong những điều sau đây: :values',
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là một khu vực hợp lệ.',
    'unique' => ':attribute đã được thực hiện.',
    'uploaded' => ':attribute không thể tải lên.',
    'url' => ':attribute định dạng không hợp lệ.',
    'uuid' => ':attribute phải hợp lệ UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
