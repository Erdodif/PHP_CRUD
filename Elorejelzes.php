<?php
class Elorejelzes{
    private $id;
    private $datum;
    private $hofok;
    private $leiras;

    public function __construct($id, $datum, $hofok, $leiras){
        $this->id = $id;
        $this->datum = new DateTime($datum);
        $this->hofok = $hofok;
        $this->leiras = $leiras;
    }

    
    public function getId(){
        return $this->id;
    }

    public function getDatum(){
        return $this->datum->format("Y-m-d");
    }

    public function getLeiras(){
        return $this->leiras;
    }
    
    public function getHofok(){
        return $this->hofok;
    }

    public static function form(?Elorejelzes $elem = null) :string{
        if($elem !== null){
            $id = $this->getId();
            $hofok = $this->getHofok();
            $datum = $this->getDatum();
            $leiras = $this->getLeiras();
        } else {
            $id = "";
            $hofok = "";
            $datum = "";
            $leiras = "";
        }
        return "
        <form method='POST'>
            <input type='hidden' name='action' value='create'>
            <span class='hofok'><input type='text' name='hofok' placeholder='10' value='$hofok'> C°</span>
            <input type='date' name='datum' value='$datum'>
            <input type='text' name='leiras' placeholder='Leírás'value='$leiras'>
            <input type='submit' value='Feltölt'>
        </form>
        ";
    }

    public function kartya() : string{
        $id = $this->getId();
        $hofok = $this->getHofok();
        $datum = $this->getDatum();
        $leiras = $this->getLeiras();
        return "
        <a class='kartya' href='edit.php?id=$id'>
            <div class='hofok'>
                $hofok C°
            </div>
            <div class='datum'>
                $datum
            </div>
            <div class='leiras'>
                $leiras
            </div>
        </a>
        ";
    }

    public static function getById($id) : Elorejelzes {
        global $db;
        $t = $db->prepare("SElECT * FROM elorejelzes WHERE `elorejelzes`.`id` = :id");
        $t->bindParam("id",$id);
        $t->execute();
        $data = $t->fetchAll();
        return new Elorejelzes(
            $data[0]["id"],
            $data[0]["datum"],
            $data[0]["hofok"],
            $data[0]["leiras"]
        );
    }

    public static function osszes() : array {
        global $db;
        $t = $db->query("SELECT * FROM `elorejelzes` ORDER BY `datum` DESC")
        ->fetchAll();
        $eredmeny = [];

        foreach($t as $elem){
            $elorejelzes = new Elorejelzes(
                $elem["id"],
                $elem["datum"],
                $elem["hofok"],
                $elem["leiras"]
            );
            $eredmeny[] = $elorejelzes;
        }
        return $eredmeny;
    }
}