<?php

namespace App\Traits;

/**
 * Trait optionsLink
 * Options helpers
 *
 * @package App\Http\ServiceTraits
 */

trait optionsLink
{
    protected $_options = null;
    protected $data = [];

    /**
     * Cache for options array
     */
    private function getOptions()
    {
        if ($this->_options == null)
        {
            $this->_options = $this->options->toArray();
        }
    }

    /**
     * Get an option from options array
     *
     * @param $key
     * @return mixed|string
     */
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
