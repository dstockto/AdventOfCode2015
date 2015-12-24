<?php

namespace Day8;

class CharCount
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function getCodeCount()
    {
        return strlen($this->string);
    }

    public function getCharCount()
    {
        $string = $this->string;

        $string = trim($string, '"');
        $string = preg_replace('#\\\x[0-9a-f]{2}#', '%', $string);
        $string = str_replace('\"', '"', $string);
        $string = str_replace("\\\\", '\\', $string);

        return strlen($string);
    }

    public function getCharacterDifference()
    {
        return $this->getCodeCount() - $this->getCharCount();
    }

    public function getEncodedCount()
    {
        $string = $this->string;
        $string = str_replace('\\', '\\\\', $string);
        $string = str_replace('"', '\"', $string);


        $string = '"' . $string . '"';

        return strlen($string);
    }
}
