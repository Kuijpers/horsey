<?php
namespace DKW\Tracking;

/**
 * Description of Cookie
 * 
 * This class is built to do all nescesary stuff with COOKIES
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Cookie {
    /**
     * List of constants
     */
    const Session = null;
    const Onehour = 3600;
    const Workday = 30600;
    const OneDay = 86400;
    const SevenDays = 604800;
    const ThirtyDays = 2592000;
    const SixMonths = 15811200;
    const OneYear = 31536000;
    const Lifetime = -1; // 2030-01-01 00:00:00

  /**
   * cookie_exists($name)
   * Returns true if there is a COOKIE with this name.
   *
   * @param string $name The name of the COOKIE
   * @return bool TRUE or FALSE
   */
  static public function cookie_exists($name)
      {
        return isset($_COOKIE[$name]);
      }

  /**
   * cookie_isempty($name)
   * Returns true if there no COOKIE with this name or it's empty, or 0,
   * or a few other things. Check http://php.net/empty for a full list.
   *
   * @param string $name The name of the COOKIE
   * @return bool TRUE or FALSE
   */
  static public function cookie_isempty($name)
      {
        return empty($_COOKIE[$name]);
      }

  /**
   * cookie_get($name, $default = '')
   * Get the value of the given COOKIE. If the cookie does not exist the value
   * of $default will be returned.
   *
   * @param string $name The name of the COOKIE
   * @param string $default Empty variable
   * @return mixed Return COOKIE or default setting
   */
  static public function cookie_get($name, $default = '')
     {
        return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default);
      }

  /**
   * cookie_set($name, $value, $expiry = self::OneYear, $path = '/', $domain = false)
   * Set a COOKIE. Silently does nothing if headers have already been sent.
   *
   * @param string $name The name of the COOKIE
   * @param string $value The value that will be carried by the COOKIE
   * @param mixed $expiry The expiry time of the COOKIE Set as for example Cookie::ThirtyDays 
   *    Options for :
   *        1   -   Session     Means it expires when browser is closed
   *        2   -   Onehour     Means it expires after 60 minutes
   *        3   -   Workday     Means it expires after 8,5 hours
   *        4   -   OneDay      Expires after 24 hours
   *        5   -   SevenDays   Expires after 7 x 24 hours
   *        6   -   ThirtyDays  Expires after 30 x 24 hours
   *        7   -   SixMonths   Expires after 183 x 24 hours
   *        8   -   OneYear     Expires after 365 x 24 hours
   *        9   -   Lifetime    Will expire at 2030-01-01 00:00:00
   * @param string $path The path for which the COOKIE is ment to be.
   * @param string $domain The domain for which the COOKIE is ment to be
   * @return bool This sets the COOKIE with the information gathered
   */
  static public function cookie_set($name, $value, $expiry = self::OneYear, $path = '/', $domain = false)
      {
        $retval = false;
        if (!headers_sent())
        {
          if ($domain === false)
            $domain = $_SERVER['HTTP_HOST'];

          if ($expiry === -1)
            $expiry = 1893456000; // Lifetime = 2030-01-01 00:00:00
          elseif (is_numeric($expiry))
            $expiry += time();
          else
            $expiry = strtotime($expiry);

          $retval = @setcookie($name, $value, $expiry, $path, $domain);
          if ($retval)
            $_COOKIE[$name] = $value;
       }
        return $retval;
      }

  /**
   * cookie_delete($name, $path = '/', $domain = false, $remove_from_global = false)
   * Delete a cookie.
   *
   * @param string $name The name of the COOKIE
   * @param string $path The path for which the COOKIE is ment to be.
   * @param string $domain The domain for which the COOKIE is ment to be
   * @param bool $remove_from_global Set to true to remove this cookie from this request.
   * @return bool
   */
  static public function cookie_delete($name, $path = '/', $domain = false, $remove_from_global = false)
      {
        $retval = false;
        if (!headers_sent())
        {
          if ($domain === false)
            $domain = $_SERVER['HTTP_HOST'];
            $retval = setcookie($name, '', time() - 3600, $path, $domain);

          if ($remove_from_global)
            unset($_COOKIE[$name]);
       }
            return $retval;
      }
      
    /**
     * cookie_display()
     * Show all cookies
     * 
     * @return mixed All cookie related information
    */
      
    static public function cookie_display()
        { 
            foreach ($_COOKIE as $key=>$val)  
                {
                    echo $key.' is '.$val."<br>\n";
                }   
        }
}

        /*
         *    Ways of usage
         *     
         *        // Style preference, persists only until the browser is closed
         *        Cookie::Set('style', 'black_and_orange', Cookie::Session);
         *
         *        // Remember the users email address to pre-fill the login form when they return
         *         Cookie::Set('rememberme', 'email@domain.com', Cookie::ThirtyDays);
         *        
         *        // Tracking cookie that effectively lasts forever
         *        Cookie::Set('tracking', 'sdfoiwuyo8who8wfhow8fhso4', Cookie::Lifetime, '/', '.domain.com');
         *

        
        
        */




