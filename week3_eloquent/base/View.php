<?php

namespace Base;
Class View
{
    private $templatePath;
    private $data;
    private $twig;


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

    public function assign($data)
    {
        foreach ($data as $key => $value)
        {
            $this->data[$key] = $value;
        }
    }

    public function twigRender($template, $data = [])
    {
        if (!$this->twig)
        {
            $loader = new \Twig\Loader\FilesystemLoader($this->templatePath);
            $this->twig = new \Twig\Environment($loader);
        }
        return $this->twig->render($template, $data);
    }
}
