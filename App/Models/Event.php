<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Event extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT eventi.event_id, eventi.costo, utenti.nome, utenti.cognome, eventi.titolo FROM eventi join utenti on eventi.organizzatore= id_utente');
        $result = array();
        
        if ($stmt->num_rows > 0) {
            // output data of each row
            while($row = $stmt->fetch_assoc()) {
                $obj = [
                    "event_id" => $row["event_id"],
                    "titolo" => $row["titolo"],
                    "nome_organizzatore" => $row["nome"],
                    "cognome_organizzatore" => $row["cognome"],
                    "costo" => floatval($row["costo"])
                ];
                array_push($result,$obj);
            }
        }
        static::closeDB();
        return $result;
    }

    public static function getEvent($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT eventi.event_id, eventi.cost, utenti.nome, utenti.cognome, eventi.titolo FROM eventi join utenti on eventi.organizzatore= id_utente WHERE event_id='.$id);
        $result = array();
        if ($stmt->num_rows > 0) {
            // output data of each row
            $row = $stmt->fetch_assoc();
            $obj = [
                "event_id" => $row["event_id"],
                "titolo" => $row["titolo"],
                "nome_organizzatore" => $row["nome"],
                "cognome_organizzatore" => $row["cognome"],
                "costo" => floatval($row["costo"])
            ];
            array_push($result,$obj);
        }
        static::closeDB();
        return $result;
    }
    
    }
