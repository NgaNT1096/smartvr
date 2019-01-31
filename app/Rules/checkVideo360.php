<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkVideo360 implements Rule
{
    protected $maxWidth;
    protected $maxHeight;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($maxWidth,$maxHeight)
    {
        $this->maxHeight =  $maxHeight;
        $this->maxWidth = $maxWidth;
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

     }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The video attribute excess dismisions.';
    }
}
