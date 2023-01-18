<?php

class Instructeurs extends Controller
{
    //properties
    private $instructeurModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->instructeurModel = $this->model('Instructeur');
    }

    public function index()
    {
        $records = $this->instructeurModel->getInstructeurs();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Voornaam</td>
                        <td>$items->Tussenvoegsel</td>
                        <td>$items->Achternaam</td>
                        <td>$items->Mobiel</td>
                        <td>$items->Datum_in_dienst</td>
                        <td>
                            <a href='" . URLROOT . "/instructeurs/update/$items->Id'> + </a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Alle instructeurs zonder Auto",
            'rows' => $rows
        ];
        $this->view('instructeurs/index', $data);
    }

    public function update($id = null) 
    {
        /**
         * Controleer of er gepost wordt vanuit de view update.php
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Maak het $_POST array schoon
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->instructeurModel->updateInstructeur($_POST);

            header("Location: " . URLROOT . "/instructeur/index");
        }

        $record = $this->instructeurModel->getInstructeur($id);

        $data = [
            'title' => 'Beschikbare Autos',
            'Id' => $record->Id,
            'Kenteken' => $record->Kenteken,
            'Type' => $record->Type,
            'Bouwjaar' => $record->Bouwjaar,
            'Brandstof' => $record->Brandstof
        ]; 
        $this->view('instructeur/update', $data);
    }

    public function delete($id)
    {
        $result = $this->instructeurModel->deleteInstructeur($id);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/instructeur/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/instructeur/index");
        }
    }
}