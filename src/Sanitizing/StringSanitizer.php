<?php

namespace Jimmeak\Youtube\Sanitizing;

class StringSanitizer
{
    public function __invoke(string $value): string
    {
        $value = $this->trim($value);
        $value = $this->htmlSpecialChars($value);
        $value = $this->stripTags($value);
        $value = $this->stripSlashes($value);
        $value = $this->stripCslashes($value);

        return $this->htmlEntities($value);
    }

    public function trim(string $value): string
    {
        return trim($value);
    }

    public function htmlSpecialChars(string $value): string
    {
        return htmlspecialchars($value);
    }

    public function stripTags(string $value): string
    {
        return strip_tags($value);
    }

    public function stripSlashes(string $value): string
    {
        return stripslashes($value);
    }

    public function stripCslashes(string $value): string
    {
        return stripcslashes($value);
    }

    public function htmlEntities(string $value): string
    {
        return htmlentities($value);
    }
}