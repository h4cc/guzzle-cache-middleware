<?php

namespace Kevinrob\GuzzleCache;


class KeyValueHttpHeader
{
    const REGEX_SPLIT = '/^([^=]*)=(.*)$/';

    /**
     * @var string[]
     */
    protected $values = [];


    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        foreach ($values as $value) {
            $matches = [];
            if (preg_match(self::REGEX_SPLIT, $value, $matches)) {
                $this->values[trim($matches[1])] = trim($matches[2]);
            } else {
                $this->values[trim($value)] = true;
            }
        }
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        // For performance, we can use isset,
        // but it will not match if value == 0
        return isset($this->values[$key]) || array_key_exists($key, $this->values);
    }

    /**
     * @param string $key
     * @return string
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->values[$key];
        }

        return "";
    }

}
