<?php

namespace Controllers;

class Authenticatable
{
    /**
     * @return Boolean
     */
    public function access(array $items)
    {
        $age = (int) $items['age'];
        $result = ['status' => true];

        if(empty($items['name']) || mb_strlen($items['name']) <= 3){
            $result['status'] = false;

        } elseif(empty($items['email']) || strpos($items['email'], '@') === false || strpos($items['email'], '.', strpos($items['email'], '@')) === false){
            $result['status'] = false;

        } elseif(empty($age) || $age <= 0){
            $result['status'] = false;
        }

        echo json_encode($result);
    }
}
