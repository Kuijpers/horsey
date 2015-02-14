<?php
/**
 * Description of Date
 * 
 * Within this class we handle everything needed for the date settings
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Date {
	/**
         * dateconvert_nl($timestamp)
         * This method can be used to convert the timestamp to european date/time
         * 
         * @param integer $timestamp The timestamp that needs to be converted
         * @return Date/Time European date and time
         */
	public static function dateconvert_nl($timestamp)
		{
			$date = date("d-m-Y H:i:s", $timestamp);
			
			return $date;
		}
	/**
         * dateconvert($timestamp)
         * This method can be used to convert the timestamp to US date/time
         * 
         * @param integer $timestamp The timestamp that needs to be converted
         * @return Date/Time US date and time
         */
	private static function dateconvert($timestamp)
		{
			$date = date("Y-m-d H:i:s", $timestamp);
			
			return $date;
		}
	/**
         * format_interval(DateInterval $interval)
         * Creates an overview of time formated in a list
         * 
         * @param DateInterval $interval Value that needs to be formated
         * @return string Formated string
         */	
	private static function format_interval(DateInterval $interval) 
		{	
    		$result = "";
    		if ($interval->y) { $result .= $interval->format("%y Jaar "); }
    		if ($interval->m) { $result .= $interval->format("%m Maand(en) "); }
    		if ($interval->d) { $result .= $interval->format("%d Dag(en) "); }
    		if ($interval->h) { $result .= $interval->format("%h Uur "); }
    		if ($interval->i) { $result .= $interval->format("%i Minuut "); }
    		if ($interval->s) { $result .= $interval->format("%s Seconde "); }

   			return $result;
		}
	/**
         * date_difference($timestamp1,$timestamp2)
         * Shows the difference in time between 2 timestamps
         * 
         * @param integer $timestamp1
         * @param integer $timestamp2
         * @return string Formated string
         */
	public static function date_difference($timestamp1,$timestamp2)
		{
			$time1	=	Date::dateconvert($timestamp1);
			$time2	=	Date::dateconvert($timestamp2);
			
			$first_date = new DateTime($time1);
			$second_date = new DateTime($time2);
			
			
			$difference	=	$first_date->diff($second_date);
			
			return Date::format_interval($difference);
			
		}
	/**
         * get_timestamp()
         * Get a new timestamp for the current moment
         * 
         * @return integer Timestamp of current moment
         */
	public static function get_timestamp()
		{
			$date = new DateTime();
			return $date->getTimestamp();
		}
} // End of class


