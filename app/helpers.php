<?php

if(! function_exists('view')) {
    function view($view) {
        return new App\Http\Response($view);
    }
}

if(! function_exists('viewPath')) {
    function viewPath($view) {
        return __DIR__ . "/../views/$view.php";
    }
}

if(! function_exists('redirect')) {
    function redirect($url='/404.html', $statusCode = 404)
{
    echo '<script type="text/javascript">
    window.location = "'.$url.'"
</script>';
   die();
}
}


trait Sanitize
{
    public function __set($name, $value)
    {
        $filteredValue = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        $filteredValue = trim($filteredValue);
        $this->$name = $filteredValue;
    }
}