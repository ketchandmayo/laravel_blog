<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\+7\d{10}$/', $value)) {
            // Если правило не пройдено, вызываем $fail с сообщением об ошибке
            $fail(__('Некорректный формат номера телефона. Номер должен начинаться с +7 и содержать 10 цифр.'));
        }
    }
}
