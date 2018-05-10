<?php
/**
 * Plugin Name:     Simple Templating
 * Description:     Helper API to decrease spaghetti code in plugins
 */

class SimpleTemplating
{

    public $file;
    public $conversion_array;
    public $loaded_content;

    public function __construct($file, $conversion_array)
    {   

        // don't be gentle about warnings
        if (empty($file)) wp_die(__FILE__ . ": file cannot be blank");
        if (array_count_values($conversion_array) <= 0) wp_die(__FILE__ . ": array must be populated");

        // local properties
        $this->file = $file;
        $this->conversion_array = $conversion_array;

        // step by step
        $this->import_template_file();
        $this->apply_conversion();

    }

    private function import_template_file()
    {
        $this->loaded_content = file_get_contents($this->file);
    }

    public function apply_conversion() {
        foreach($this->conversion_array as $k=>$v) {
            $this->loaded_content = str_replace($k, $v, $this->loaded_content);
        }
    }

    public function echo() {
        return $this->loaded_content;
    }
}
