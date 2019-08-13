<?php

namespace Site\Model\Menu;

use Core\Model;

class MenuRepository extends Model {

    public function getAllItems()
    {
        $sql = $this->queryBuilder->select()
            ->from('menu')
            ->orderBy('id', 'ASC')
            ->sql();
        return $this->db->query($sql);
    }
}
