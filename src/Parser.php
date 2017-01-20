<?php

namespace Bibloos\Admiral;


class Parser
{

    public function check($string): bool
    {
        $valid = false;
        if(is_string($string))
        {
            $valid = true;
            $parenthesesStruct = array();

            for($i = 0; $i < strlen($string); $i++)
            {
                $char = $string[$i];
                if($char == '('){
                    array_push($parenthesesStruct, $char);
                }
                if($char == ')'){
                    array_push($parenthesesStruct, $char);
                }
            }
            /*
             * sample: (()))
             *
             * array(
             * 0 => array
             *  (
             *  'char' => '(',
             *  'depth' => 1
             *  ),
             * 1 => array
             *  (
             *  'char' => '(',
             *  'depth' => 2
             *  ),
             * 2 => array
             *  (
             *  'char' => ')',
             *  'depth' => 2
             *  ),
             * 3 => array
             *  (
             *  'char' => ')',
             *  'depth' => 1
             *  ),
             * 4 => array
             *  (
             *  'char' => ')',
             *  'depth' => 1
             *  )
             * */
            $depth = 0;
            for($i = 0; $i < count($parenthesesStruct); $i++)
            {
                if($parenthesesStruct[$i] == '('){
                    $depth++;
                }elseif($parenthesesStruct[$i] == ')'){
                    $depth--;
                }
                if($depth < 0){
                    $valid = false;
                    break;
                }else{
                    continue;
                }
            }
            if($depth == 0){
                $valid = true;
            }
        }

        return $valid;
    }
}