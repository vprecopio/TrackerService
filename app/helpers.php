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

class AutomaticForm
{
    private $id, $id_form, $data_modal_toggle, $name_button;

    private $name_form, $title_form; 

    public function __construct($name_form,$title_form)
    {
        $this->name_form = strtolower($name_form);
        $this->title_form = !empty($title_form) ? $title_form : $this->setTitleForm();
        $this->setID();
        $this->setIdForm();
        $this->setModalData();
        $this->setNameButton();
    }

    private function setTitleForm()
    {
        return "Agregar nuevo $this->name_form";
    }
    private function setID()
    {
        $this->id = 'add-'.$this->name_form.'-modal';
    }
    private function setIdForm()
    {
        $this->id_form = 'id ="'.$this->id.'"';
    }
    private function setModalData()
    {
        $this->data_modal_toggle = 'data-modal-toggle="'.$this->id.'"';
    }
    private function setNameButton()
    {
        $this->name_button = 'Agregar ' . $this->name_form;
    }

    public function GenerateButton()
    {
        include(__DIR__ . '/../views/components/form/button.php' );
    }

    public function GenerateForm()
    {
        include(__DIR__ . '/../views/components/form/form_1.php' );
    }

}