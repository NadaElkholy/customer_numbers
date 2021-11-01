<?php

namespace App;

class Helpers
{
    protected $validators;

    protected $parsed = [];
    

    public function __construct($validators)
    {
        $this->validators = $validators; 
    }

    public function normalize($data)
    {
        $data = $data->pluck('phone','id')->toArray();
        foreach ($data as $key => $value)
        {
            $phoneArray = explode(' ', $value);

            $parsed[$key]['id'] = $key;
            $parsed[$key]['country'] = $this->country($value);
            $parsed[$key]['state'] = $this->state($value);
            $parsed[$key]['code'] = $this->code($value);
            $parsed[$key]['phone'] = end($phoneArray);
        }

        return collect($parsed);
    }

    public function country($value)
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $value, $matches);
            
            if (sizeof($matches) > 0) {
                $country = $key;
            }
        }

        return $country;
    }

    public function state($value)
    {
        $valid = "NOK";

        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . $validator['regex'] . '/', $value, $matches);
            
            if (sizeof($matches) > 0) {
                $valid = "OK";
            }
        }

        return $valid;
    }

    public function code($value)
    {
        foreach ($this->validators as $key => $validator)
        {
            preg_match('/' . substr($validator['regex'], 0, 10) . '/', $value, $matches);
            
            if (sizeof($matches) > 0) {
                $code = $validator['code'];
            }
        }

        return $code;
    }
}