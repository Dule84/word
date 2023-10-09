<?php

namespace App\Util;

class PalindromeUtils
{
    public function isAlmostPalindrome($word): bool
    {
        $word = strtolower($word);
        $length = strlen($word);
        $left = 0;
        $right = $length - 1;

        while ($left < $right) {
            if ($word[$left] != $word[$right]) {

                // Try removing either the left or right character and continue checking.
                $left_removed = substr($word, 0, $left) . substr($word, $left + 1);
                $right_removed = substr($word, 0, $right) . substr($word, $right + 1);

                if ($this->isPalindrome($left_removed) || $this->isPalindrome($right_removed)) {
                    return true;
                }

                return false;
            }

            $left++;
            $right--;
        }

        return true;
    }

    public function isPalindrome($word): bool
    {
        return $word == strrev($word);
    }
}