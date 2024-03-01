<?php

declare(strict_types=1);

namespace App;

use Exception\ViewNotFoundException;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    /**
     * @param string $string this is the view name
     * @param array $params arguments for view
     * @return static returning the class object so that toString() can method can
     * cast the view as string.
     */
    public static function make(string $string, array $params = []): static
    {
        return new static($string, $params);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if(!file_exists($viewPath)){
            throw new ViewNotFoundException();
        }

        ob_start();

        include VIEW_PATH . '/' . $this->view . '.php';

        return ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

}
