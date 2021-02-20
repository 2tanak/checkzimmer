<?php

namespace App\Traits;

trait optionsLink
{
    protected $_options = null;
    protected $data = [];

    private function getOptions()
    {
        if ($this->_options == null)
        {
            $this->_options = $this->options->toArray();
        }
    }

    function getCurrentOption($key) {
        if($this->_options == null) {
            $this->getOptions();
        }
        if (($this->data[$key] ?? null) === null) {
            $index = array_search($key,array_column($this->_options,'key'));
            if($index === false) {
                return '';
            }
            $this->data[$key] = $this->_options[$index];
        }
        return ($this->data[$key] ?? '');
    }

}
