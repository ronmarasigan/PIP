<?php
    class Example extends Model {
	    public function getSomething($id) {
            try {
                $sql = 'SELECT product_name FROM product WHERE product_id = :id';
                $db = $this->connection;
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
