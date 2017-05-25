<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 24/05/17
 * Time: 14:04
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestProjetController
{
    public function calculatrice($operation,$a,$b)
    {
        switch ($operation){
            case 'ajouter': $this->ajouter($a,$b);
                break;
            case 'soustraire': $this->soustraire($a,$b);
                break;
            case 'multiplier': $this->multiplier($a,$b);
                break;
            case 'diviser': $this->diviser($a,$b);
                break;
            default:
                return false;
        }

        return true;
    }

    public function ajouter($a,$b){

        if(!is_numeric($a) or empty($a)) return false;
        if(!is_numeric($b) or empty($b)) return false;

        return (($a) + ($b));
    }

    public function soustraire($a,$b){
        if(!is_numeric($a) or empty($a)) return false;
        if(!is_numeric($b) or empty($b)) return false;

        return (($a) - ($b));
    }

    public function multiplier($a,$b){
        if(!is_numeric($a) or empty($a)) return false;
        if(!is_numeric($b) or empty($b)) return false;

        return (($a) * ($b));
    }

    public function diviser($a,$b){
        if(!is_numeric($a) or empty($a)) return false;
        if(!is_numeric($b) or empty($b)) return false;
        if( ( is_numeric($b) and !empty($b) ) and $b == 0 ) return false;

        return round((($a)/($b)),2);
    }

    public function generateRandomToken($stringForToken){

        if( strlen($stringForToken) <= 6 )
            return false;

        $regex = "#[a-zA-Z0-9]+#";

        if( preg_match($regex,$stringForToken,$matches,PREG_OFFSET_CAPTURE) === 0 )
            return false;

        if( preg_match($regex,$stringForToken,$matches,PREG_OFFSET_CAPTURE) !== 0 ) {
            if( $matches[0][1] !== 0 )
                return false;
        }
        else{

            $arr1 = str_split($stringForToken);
            //On melange le contenu de notre chaine devenu un tableau
            shuffle($arr1);
            //On randomise notre tableau obtenu ci-dessus
            $rand_keys = array_rand($arr1, count($arr1));
            $token = "";
            //Enfin on créé un token avec la chaine passée en paramètre
            for( $i=0; $i < count($arr1); $i++ ) {
                $token = $token.$arr1[$rand_keys[$i]];
            }
            return true;
        }

    }

}