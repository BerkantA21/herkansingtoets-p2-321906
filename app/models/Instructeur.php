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
        $this->db->query("SELECT Instructeur.Id
                                ,Instructeur.Voornaam
                                ,Instructeur.Tussenvoegsel
                                ,Instructeur.Achternaam
                                ,Instructeur.Mobiel
                                ,Instructeur.Datum_in_dienst
                          FROM Instructeur
                          INNER JOIN Auto
                          ON InstructeurId = Instructeur.Id
                          WHERE InstructeurId = :Id
                          ORDER BY Datum_in_dienst DESC");

        $this->db->bind(':Id', 2, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function updateInstructeur($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Instructeur
                          SET Kenteken = :Kenteken,
                              Type = :Type,
                              Bouwjaar = :Bouwjaar,
                              Brandstof = :Brandstof
                          WHERE Id = :Id");

        $this->db->bind(':Kenteken', $data['Kenteken'], PDO::PARAM_STR);
        $this->db->bind(':Type', $data['Type'], PDO::PARAM_STR);
        $this->db->bind(':Bouwjaar', $data['Bouwjaar'], PDO::PARAM_STR);
        $this->db->bind(':Brandstof', $data['Brandstof'], PDO::PARAM_INT);
        $this->db->bind(':Id', $data['Id'[0]], PDO::PARAM_INT);

        return $this->db->execute();
    }

}