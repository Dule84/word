<?php

namespace App\Services;

use App\Util\PalindromeUtils;
use ErrorException;

class DictionaryService
{
    /**
     * @throws ErrorException
     */
    public function checkIfWordExists($word): string
    {
        try {
            $data = @file_get_contents($_ENV['DICTIONARY_API'] . strtolower($word));
            $response = json_decode($data, true);

            return 'Points: ' . $this->calculateScore($response[0]['word']);
        } catch (ErrorException $e) {
            throw new ErrorException('This word does not exist in English language!');
        }
    }

    private function calculateScore($word): int
    {
        $points = count(array_unique(str_split($word)));

        $palindrome = new PalindromeUtils();

        if ($palindrome->isPalindrome($word)) {
            $points += 3;
        } elseif ($palindrome->isAlmostPalindrome($word)) {
            $points += 2;
        }

        return $points;
    }
}