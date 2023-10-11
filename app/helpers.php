<?php

if (!function_exists('view')) {
    function view($view)
    {
        return new App\Http\Response($view);
    }
}

if (!function_exists('viewPath')) {
    function viewPath($view)
    {
        return __DIR__ . "/../views/$view.php";
    }
}

if (!function_exists('redirect')) {
    function redirect($url = '/404.html', $statusCode = 404)
    {
        echo '<script type="text/javascript">
    window.location = "' . $url . '"
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

trait CheckInternet { 
    
    protected function hasConnection()
    {
        $ch = curl_init("https://www.google.com");  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
        curl_exec($ch);  
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        curl_close($ch);  
        return ($httpcode>=200 && $httpcode<300) ? TRUE : FALSE;
    }
}

use Ramsey\Uuid\Uuid;
class Seed
{
    static function GenerateSeed(string $seed):string
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS,  md5($seed))->toString();
    }

    static function CompareSeed(string $a,string $b):bool
    {
        return $a === $b ? true : false;
    }
}