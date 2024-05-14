<?php

namespace Base;
Class View
{
    private $templatePath;
    private $data;


    public function __construct()
    {

    }
    public function setTemplatePath($path)
    {
        $this->templatePath = $path;
    }
    public function render($template, $data = []): string
    {
        foreach ($data as $key => $value)
        {
            $this->data[$key] = $value;
        }

        ob_start();
        include getcwd() . '/app/View/' . $template;
        $data = ob_get_clean();
        return $data;
    }
}
