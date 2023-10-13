<?php
use App\Models\StateModel;

function splitDateRange($dateRange)
{
    list($startDate, $endDate) = explode(' - ', $dateRange);

    return [
        'startDate' => $startDate,
        'endDate' => $endDate,
    ];
}

function generateUniqueStateCode($stateName)
{
    // Convert the state name to uppercase
    $stateName = strtoupper($stateName);

    // Split the state name into words
    $words = explode(' ', $stateName);

    // Initialize the state code as an empty string
    $stateCode = '';

    // Iterate through the words and take the first letter of each word
    foreach ($words as $word) {
        $stateCode .= substr($word, 0, 1);
    }

    // Check if the generated state code already exists in the database
    $existingStates = StateModel::where('code', $stateCode)->get();

    if ($existingStates->isNotEmpty()) {
        // If a state with the same code exists, add a unique identifier (e.g., a number)
        $i = 1;
        $newStateCode = $stateCode . $i;

        // Keep incrementing the number until a unique state code is found
        while ($existingStates->contains('code', $newStateCode)) {
            $i++;
            $newStateCode = $stateCode . $i;
        }

        $stateCode = $newStateCode;
    }

    return $stateCode;
}
