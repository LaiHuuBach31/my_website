<?php

namespace App\Helper;

class Recursion {

    private $data;
    private $htmlSelect = ' ';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function permissRecursion($parentId, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {

            if($value->parent_id == $id){

                if( !empty($parentId) && $parentId == $value->id ) {
                    $this->htmlSelect .= "<option selected value='" . $value->id . "' >" . $text .  $value->name . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $value->id . "' >" . $text .  $value->name . "</option>";
                }
                $this->permissRecursion($parentId, $value->id, $text.'--');
            }
        }

        return $this->htmlSelect;
    }

    public function test($id = 0, $text = '', $parentId)
    {
        foreach ($this->data as $value) {

            if($value->parent_id == $id){
                $this->htmlSelect .= "<option value='" . $value->id . "' >" . $text .  $value->name . "</option>";
                $this->permissRecursion($value->id, $text.'--', $parentId);
            }
        }

        return $this->htmlSelect;
    }
}
