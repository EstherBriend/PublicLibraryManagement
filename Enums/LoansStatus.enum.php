<?php

enum LoanStatus : string
{
    case LATE = 'Late';
    case ONGOING = 'OnGoing';

    public function color() : string{
        return match($this){
            self::LATE => 'red',   
            self::ONGOING =>'green'
        };
    }
}
?>
