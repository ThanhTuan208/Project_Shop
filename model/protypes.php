<?php
class Prototypes extends Database
{
    public function getAllProtype()
    {
        $sql = self::$con->prepare('SELECT * FROM protypes');
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> a5fc99e44fb59381b5f4e485bdde88e282d6378d
