<?php



class RandoManager
{
    private ?PDO $db;

    /**
     * RandoManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * @param bool $solo
     * @param array|null $id
     * @return array
     */
    public function getRandos(bool $solo = false, array $id = null): array{
        $randos = [];
        $conn = $this->db->prepare("SELECT * FROM hiking");
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                //Create object with Article type
                $rando = new Rando($item["id"]);
                $rando
                    ->setName($item["name"])
                    ->setDifficulty($item["difficulty"])
                    ->setDuration($item["duration"])
                    ->setHeightDifference($item["height_difference"])
                    ->setDistance($item["distance"])
                    ->setAvalide($item["avalide"])
                ;
                $randos[] = $rando;
            }
        }
        if($solo){
            $tabReturn = [];
            foreach($randos as $rando){
                if(in_array($rando->getId(), $id)){
                    $tabReturn[] = $rando;
                }
            }
            return $tabReturn;
        }
        return $randos;
    }

    /**
     * @param Rando  $rando
     * @return bool
     */
    public function update(Rando  $rando): bool{
        if($rando->getId()){
            $conn = $this->db->prepare("
                UPDATE hiking SET
                    name = :name,
                    difficulty = :difficulty,
                    distance = :distance,
                    duration = :duration,
                    height_difference = :height_difference,
                    avalide = :avalide
                WHERE id = :id
            ");

            $conn->bindValue(":name", $rando->getName());
            $conn->bindValue(":difficulty", $rando->getDifficulty());
            $conn->bindValue(":distance", $rando->getDistance());
            $conn->bindValue(":duration", $rando->getDuration());
            $conn->bindValue(":height_difference", $rando->getHeightDifference());
            $conn->bindValue(":id", $rando->getId());
            $conn->bindValue(":avalide" , $rando->getAvalide());

            return  $conn->execute();
        }
        return false;
    }

    /**
     * @param Rando $rando
     * @return bool
     */
    public function insert(Rando $rando) {
        if(is_null($rando->getId())){
            $conn = $this->db->prepare("
                INSERT INTO hiking (name, difficulty, distance, duration, height_difference, avalide) VALUES  ( :name, :difficulty, :distance, :duration, :height_difference, :avalide)
            ");

            $conn->bindValue(":name", $rando->getName());
            $conn->bindValue(":difficulty", $rando->getDifficulty());
            $conn->bindValue(":distance", $rando->getDistance());
            $conn->bindValue(":duration", $rando->getDuration());
            $conn->bindValue(":height_difference", $rando->getHeightDifference());
            $conn->bindValue(":avalide" , $rando->getAvalide());

            return $conn->execute();
        }
        return false;
    }

    /**
     * @param Rando $rando
     * @return bool
     */
    public function delete(Rando $rando){
        if($rando->getId()){
            $conn = $this->db->prepare("
                DELETE FROM hiking WHERE id = :id
            ");
            $conn->bindValue(":id", $rando->getId());
            return $conn->execute();
        }
        return false;
    }
}