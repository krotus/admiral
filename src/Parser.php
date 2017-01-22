<?php

namespace Bibloos\Admiral;


class Parser
{

    public function check($string): bool
    {
        $valid = false;
        if(is_string($string))
        {
            $depth = 0;
            for($i = 0; $i < strlen($string); $i++)
            {
                $char = $string[$i];
                if($char == '('){
                    $depth++;
                }
                if($char == ')'){
                    $depth--;
                }
                if($depth < 0){
                    $valid = false;
                    return $valid;
                }
            }

            if($depth == 0){
                $valid = true;
            }
        }

        return $valid;
    }
}