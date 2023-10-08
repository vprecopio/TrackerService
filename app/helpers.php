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


interface ButtonAndForm
{
    public function GenerateButton();
    public function GenerateForm();
}
class AutomaticForm extends FieldForm implements ButtonAndForm
{
    private $id, $id_form, $data_modal_toggle, $name_button;

    private $name_form, $title_form;
    private $action, $method, $class;
    private $labels_form = [];

    public function __construct(string $name_form, string $title_form, string $action,string $method , string $class, array $labels_form)
    {
        $this->name_form = strtolower($name_form);
        $this->title_form = !empty($title_form) ? $title_form : $this->setTitleForm();
        $this->action = $action;
        $this->method = $method;
        $this->labels_form = $labels_form;
        $this->setID();
        $this->setIdForm();
        $this->setModalData();
        $this->setNameButton();
        $this->class = $class == '' ? 'bg-red-600' : $class; 
    }

    private function setTitleForm()
    {
        return "Agregar nuevo $this->name_form";
    }
    private function setID()
    {
        $this->id = 'add-' . $this->name_form . '-modal';
    }
    private function setIdForm()
    {
        $this->id_form = 'id ="' . $this->id . '"';
    }
    private function setModalData()
    {
        $this->data_modal_toggle = 'data-modal-toggle="' . $this->id . '"';
    }
    private function setNameButton()
    {
        $this->name_button = 'Agregar ' . $this->name_form;
    }

    public function GenerateButton()
    {
        include(__DIR__ . '/../views/components/form/button.php');
    }

    public function GenerateForm()
    {
        include(__DIR__ . '/../views/components/form/form_1.php');
    }

    private function AllFields()
    {
        $this->GenerateFields($this->labels_form);
    }
}

class FieldForm
{
    private $label;

    private $options;

    private function setLabel($labelArray)
    {
        $this->label = new ArrayIterator($labelArray);
    }

    private function setPlaceholder($placeholder)
    {
        return $placeholder ? 'placeholder="' . $placeholder . '"' : '';
    }

    private function setRequire($required)
    {
        return $required ? 'required' : '';
    }


    public function GenerateFields(array $array): void
    {
        $this->setLabel($array);
        foreach ($this->label as $label) {
            if (isset($label["options"])) {
                echo $this->GenerateFieldOption($label['id_name'], $label['title_label'], $label["type"], $label["height"], $label["required"], $label["options"], $label['options_table']);
            } else {
                echo $this->GenerateFieldBasic($label['id_name'], $label['title_label'], $label["type"], $label["height"], $label["placeholder"], $label["required"], false);
            }
        }
    }

    private function GenerateFieldBasic(string $label_id, string $label_name, string $type, int $height, string|bool $placeholder, bool $required)
    {
        return '
            <div class="col-span-' . ($height * 2) . ' sm:col-span-' . $height . '">
                <label for="' . $label_id . '" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">' . $label_name . '</label>
                <input type="' . $type . '" name="' . $label_id . '" id="' . $label_id . '" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ' . $this->setPlaceholder($placeholder) . $this->setRequire($required) . '>
            </div>';
    }

    private function GenerateFieldOption(string $label_id, string $label_name, string $type, int $height, bool $required, $options, $option_table)
    {
        $option_table_decod = json_decode($options);
        $this->options = '';

        foreach ($option_table_decod as $value)
        {
            if (property_exists($value, $option_table))
            {
                $v = $value->$option_table;
                $this->options .= '<option>'.$v.'</option>';
            }
        }

        return '
        <div class="col-span-'.$height.'">
            <label for="' . $label_id . '" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">' . $label_name . '</label>
            <select id="' . $label_id . '" name="' . $label_id . '" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" ' . $this->setRequire($required) . '>
            '.$this->options.'
            </select>
        </div>
        ';
    }
}
