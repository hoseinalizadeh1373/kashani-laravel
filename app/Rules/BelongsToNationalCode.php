<?php

namespace App\Rules;

use App\Services\Searchline\Searchline;
use Illuminate\Contracts\Validation\Rule;

class BelongsToNationalCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $searchline = new Searchline;
        return $searchline->isMobileBelongsToPerson(request('mobile'),$value);
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شماره موبایل و کد ملی وارد شده با یکدیگر مطابقت ندارند';
    }
}
