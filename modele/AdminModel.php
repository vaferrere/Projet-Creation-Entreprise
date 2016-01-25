<?php


class AdminModel {
    public static function selectAdmin(){
        $b = new AdminGateway(new Connection());
        $result = $b->select();
        return $result;
    }
}
