<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class CheckHandler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!str_starts_with($value, '@')) {
            $fail('Precisa começar com um @');
            return;
        }

        if (!preg_match('/^@[A-Za-z0-9_-]+$/', $value)) {
            $fail('Você só pode usar _ - letras e números após o @');
            return;
        }

        if (str_contains($value, ' ')) {
            $fail('Não pode conter espaço entre os caracteres');
        }
    }
}
