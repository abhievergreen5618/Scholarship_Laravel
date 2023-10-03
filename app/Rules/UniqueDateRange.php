<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;
use App\Models\ScholarshipSession;

class UniqueDateRange implements Rule
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
        list($startDate, $endDate) = explode(' - ', $value);

        // Check for conflicts in the database
        $conflicts = ScholarshipSession::where(function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->where('session_duration_start', '<=', $startDate)
                  ->where('session_duration_end', '>=', $startDate);
            })->orWhere(function ($q) use ($startDate, $endDate) {
                $q->where('session_duration_start', '<=', $endDate)
                  ->where('session_duration_end', '>=', $endDate);
            });
        })->exists();

        return !$conflicts;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The session duration conflicts with an existing record.';
    }
}
