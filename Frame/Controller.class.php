<?php

/**
 * base Controller
 */
class Controller
{
    /**
     * @var array $var for pass var to view
     */
    protected $var = [];
    /**
     * display html
     * @param string $view html file name
     */
    protected function display($view)
    {
        extract($this->var);
        require V_DIR . CONTROLLER . "/{$view}";
    }
    protected function assign($var, $value)
    {
        $this->var[$var] = $value;
    }
    /**
     * jump and set get params
     */
    protected function jump($p, $c, $a, $extra = null)
    {
        if ($extra) {
            $extra = "&extra={$extra}";
        }
        header('Location: ' . "{$_SERVER['PHP_SELF']}?p={$p}&c={$c}&a={$a}{$extra}");
    }
}
