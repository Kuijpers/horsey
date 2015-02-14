<?php
/**
 * Description of Account
 * 
 * Within this class we handle everything needed for the account information
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Account{
    /**
     *  function __construct will automatically generate when method is called
     */
    public function __construct(){
        
    }
    
    /**
     * @param INT $data numbers 0-24 can be used 
     * @return string Corresponding letter of the alfabet in capital
     */
    private static function _getLetterDesc($data){
        switch($data){
            case '1': return 'A'; break;    case '2': return 'B'; break;    case '3': return 'C'; break;
            case '4': return 'D'; break;    case '5': return 'E'; break;    case '6': return 'F'; break;
            case '7': return 'G'; break;    case '8': return 'H'; break;    case '9': return 'I'; break;
            case '10': return 'J'; break;   case '11': return 'K'; break;   case '12': return 'L'; break;
            case '13': return 'M'; break;   case '14': return 'N'; break;   case '15': return 'O'; break;
            case '16': return 'P'; break;   case '17': return 'Q'; break;   case '18': return 'R'; break;
            case '19': return 'S'; break;   case '20': return 'T'; break;   case '21': return 'U'; break;
            case '22': return 'V'; break;   case '23': return 'W'; break;   case '24': return 'X'; break;
            case '0': return 'Z'; break;    default:return 'Data input is not valid';
        }
    }
    /**
     * @param INT $data numbers 0-24 can be used
     * @return string Corresponding letter of the alfabet in capital
     */
    private static function _getLetterAsc($data){
        switch($data){
            case '1': return 'Z'; break;    case '2': return 'X'; break;    case '3': return 'W'; break;
            case '4': return 'V'; break;    case '5': return 'U'; break;    case '6': return 'T'; break;
            case '7': return 'S'; break;    case '8': return 'R'; break;    case '9': return 'Q'; break;
            case '10': return 'P'; break;   case '11': return 'O'; break;   case '12': return 'N'; break;
            case '13': return 'M'; break;   case '14': return 'L'; break;   case '15': return 'K'; break;
            case '16': return 'J'; break;   case '17': return 'I'; break;   case '18': return 'H'; break;
            case '19': return 'G'; break;   case '20': return 'F'; break;   case '21': return 'E'; break;
            case '22': return 'D'; break;   case '23': return 'C'; break;   case '24': return 'B'; break;
            case '0': return 'A'; break;     default:return 'Data input is not valid';
        }
    }
    /** 
     * userAccount()
     * Create a useraccountnumber
     * 
     * @return variable 
     */
    public static function userAccount(){
        $number = self::_getLetterDesc(date('y'));
        $number .= self::_getLetterDesc(date('n'));
        $number .= date('d');
        $number .= self::_getLetterDesc(date('G'));
        $number .= date('i');
        $number .= date('s');
        return $number;
    }
    /**
     * orgAccount()
     * Create a organisationaccountnumber
     * 
     * @return variable
     */
    public static function orgAccount(){
        $number = self::_getLetterDesc(date('y'));
        $number .= self::_getLetterDesc(date('n'));
        $number .= date('d');
        $number .= date('H');
        $number .= date('i');
        $number .= date('s');
        return $number;
        
    }
    /**
     * verificationAccount()
     * Creates a number that can be used as a verificationnumber
     * 
     * @return variable This outcome is used as a verificationtool
     */
    public static function verificationAccount(){
        $number  = self::_getLetterDesc(date('y'));
        $number .= self::_getLetterDesc(date('n'));
        $number .= date('d');
        $number .= self::_getLetterDesc(date('G'));
        $number .= date('i');
        $number .= date('s');
        $number .= time();
        $number .= self::_getLetterAsc(date('y'));
        $number .= self::_getLetterAsc(date('n'));
        $number .= date('d');
        $number .= date('H');
        $number .= date('i');
        $number .= date('s');
        $number .= substr(md5(rand()), 0, 7); 
        return $number;
    }
} // End of class