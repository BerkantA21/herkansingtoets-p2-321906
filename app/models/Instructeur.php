<?php

/**
 * Dit is de model voor de controller Instructeurs
 */

class Instructeur
{
    //properties
    private $db;

    // Dit is de constructor van de Instructeur model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstructeurs()
    {
        $this->db->query('SELECT * FROM Instructeur');
        return $this->db->resultSet();
    }

    public function getInstructeur()
    {
        $this->db->query("SELECT Instructeur.Datum_in_dienst
                                ,Instructeur.Id as LEID
                                ,Auto.Id
                                ,Instructeur.Instructeur as LENA
                                ,Auto.Naam as INNA
                          FROM Auto
                          INNER JOIN Auto
                          ON Auto.InstructeurId = Instructeur.Id
                          INNER JOIN Instructeur
                          ON Auto.Id = Instructeur.AutoId
                          WHERE InstructeurId = :Id");

        $this->db->bind(':Id', 2, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function updateInstructeur($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Instructeur
                          SET Type = :Type,
                              Kenteken = :Kenteken,
                              Bouwjaar = :Bouwjaar,
                              Brandstof = :Brandstof
                          WHERE Id = :Id");

        $this->db->bind(':Type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':Kenteken', $data['kenteken'], PDO::PARAM_STR);
        $this->db->bind(':Bouwjaar', $data['bouwjaar'], PDO::PARAM_STR);
        $this->db->bind(':Brandstof', $data['brandstof'], PDO::PARAM_INT);
        $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

}