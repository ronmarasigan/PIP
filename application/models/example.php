<?php
    class Example extends Model {
	    public function addID($id) {
            try {
                $sql = 'INSERT INTO id (id) VALUES (:id)';
                $db = $this->getDB();
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
