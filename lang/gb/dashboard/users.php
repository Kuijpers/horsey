    <?php

    // Default USERS language list

    // DO NOT CHANGE
            // Check if CONSTANT exists
            if(!defined('IN_HORSEY')){
                exit;
            }

            if (empty($lang) || !is_array($lang)){
                $lang = [];
            }


     $lang = array_merge($lang, [

         'USERS_DEFAULT'    =>  'Users',
         
         'USERS_DEFAULT_USERID'               =>  'User ID',
         'USERS_DEFAULT_FIRSTNAME'            =>  'Firstname',
         'USERS_DEFAULT_LASTNAME'             =>  'Lastname',
         'USERS_DEFAULT_NAME'                 =>  'Name',
         'USERS_DEFAULT_ADDRESS'              =>  'Address',
         'USERS_DEFAULT_POSTCODE'             =>  'Postcode',
         'USERS_DEFAULT_CITY'                 =>  'City',
         'USERS_DEFAULT_POSTCITY'             =>  'Postcode and City',
         'USERS_DEFAULT_STATE'                =>  'State / Province',
         'USERS_DEFAULT_COUNTRY'              =>  'LCountry',
         'USERS_DEFAULT_TELEPHONE'            =>  'Phone number',
         'USERS_DEFAULT_EMAIL'                =>  'Emailaddress',
         'USERS_DEFAULT_USER'                 =>  'User',
         'USERS_DEFAULT_USERNAME'             =>  'Username',
         'USERS_DEFAULT_USER_TYPE'            =>  'Usertype',
         
         'USERS_DEFAULT_CHANGEPASS'           =>  'Change password',
            'USERS_DEFAULT_CHANGEPASS_OLD'           =>  'Old password',
            'USERS_DEFAULT_CHANGEPASS_NEW'           =>  'New password',
            'USERS_DEFAULT_CHANGEPASS_REPEAT'           =>  'Repeat new password',
         
         
         
         'USERS_DEFAULT_USERTYPE'       => '',
            'USERS_DEFAULT_USERTYPE_OWNER'              => 'Owner',     
            'USERS_DEFAULT_USERTYPE_ADMIN'              => 'Admin',     
            'USERS_DEFAULT_USERTYPE_USER'               => 'User',
         
         'USERS_DEFAULT_STATUS'       =>  '',
         
            'USERS_DEFAULT_STATUS_TITLE'       =>  '',
                'USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'    =>  'First log required',
                'USERS_DEFAULT_STATUS_TITLE_ACTIVE'      =>  'Active',
                'USERS_DEFAULT_STATUS_TITLE_BLOCKED'     =>  'Blocked',
                'USERS_DEFAULT_STATUS_TITLE_INACTIVE'    =>  'Inactive',
         
         
/*
 *  Related to Index page
 */
         
     'USERS_INDEX'                      =>'',
         
         'USERS_INDEX_ADD_TITLE'                   =>  'Add new user',
         
         'USERS_INDEX_ALL'          =>  '',
             'USERS_INDEX_ALL_CURRENT'          =>  'All current users',
         
         'USERS_INDEX_USERTYPE'     =>  'Usertype',
            'USERS_INDEX_USERTYPE_OWNER'                =>  'Owner',
            'USERS_INDEX_USERTYPE_ADMIN'                =>  'Admin',
            'USERS_INDEX_USERTYPE_USER'                 =>  'User',
         
         'USER_INDEX_USERPROFILE' => '',
             'USERS_INDEX_USERPROFILE_ALT'      =>  'Go to userprofile.',
             'USERS_INDEX_USERPROFILE_TITLE'    =>  'Go to userprofile.',
         
         'USERS_INDEX_USEREDIT'             =>'',
             'USERS_INDEX_USEREDIT_ALT'         =>  'Change userprofile.',
             'USERS_INDEX_USEREDIT_TITLE'       =>  'Change userprofile.',
         
         'USERS_INDEX_USERDELETE'           =>  '',
             'USERS_INDEX_USERDELETE_ALT'       =>  'Delete user.',
             'USERS_INDEX_USERDELETE_TITLE'     =>  'Delete user.',
         
/*
 *  Related to Details
 */
         'USERS_DETAILS_TITLE'              =>  'User overview.',
         'USERS_DETAILS_MESSAGE'            =>  'All information belonging to user : ',
         
         'USERS_DETAILS_TITLE2'             =>  'Personal information',
         'USERS_DETAILS_MESSAGE2'           =>  'Overview of all personal information for this user.',
         
         'USERS_DETAILS_CURRENTSTATUS'      =>  'Current status',
         
         'USERS_DETAILS_TITLE3'             =>  'Change status',
         'USERS_DETAILS_MESSAGE3'           =>  'Below is an overview of all statuschanges for this user. ',
 
/*
 * Related to Update 
 */
         
         'USERS_UPDATE_TITLE'                =>  'Change userinformation.',
         
 /*
  * Related to Cookies
  */        
         'USERS_INDEX_COOKIES_SUCCES_ADDED'     => 'New user is added!!',
         'USERS_INDEX_COOKIES_SUCCES_CHANGED'   => 'De status is changed!!',
         'USERS_INDEX_COOKIES_SUCCES_UPDATED'   => 'Updates are processed !!',
         'USERS_INDEX_COOKIES_SUCCES_REMOVED'   => 'User is deleted !!',
         
         'USERS_INDEX_COOKIES_WARNING_GLOBAL'   => 'Something went wrong. Please try again !!',
         
         'USERS_INDEX_COOKIES_DANGER_OWNER_CHANGE'     => 'Owner information can\'t be chenged !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_DELETE'     => 'The owner can not be deleted !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_OWN_STATUS' => 'It is not possible to change your own status !!',
         
/*
 * Related to Modal pages
 */         
         'USERS_INDEX_MODAL_STATUS'         =>  '',
            
         'USERS_INDEX_MODAL_STATUS_MESSAGE'         =>  '',
                'USERS_INDEX_MODAL_STATUS_MESSAGE_REASON'     =>  '&nbsp; Please give a reason for changing the status of : ',
            
         'USERS_INDEX_MODAL_STATUS_CHANGE'         =>  'Change status',
            'USERS_INDEX_MODAL_STATUS_CHANGE_USERID'    =>  'User ID',
            'USERS_INDEX_MODAL_STATUS_CHANGE_STATUS'    =>  'Change status to : ',
            'USERS_INDEX_MODAL_STATUS_CHANGE_REASON'    =>  'The reason of this status change ',
         
         'USERS_INDEX_MODAL_DELETE'         =>  '',
         
             'USERS_INDEX_MODAL_DELETE_TITLE'         =>  'Confirm deleting a user.',
         
             'USERS_INDEX_MODAL_DELETE_CONFIRM'         =>  'Confirm deleting this user.',
                 'USERS_INDEX_MODAL_DELETE_CONFIRM_USER'         =>  'Are you sure you want to delete : ',
         
         
         'USERS_INDEX_MODAL_CHANGEPASS'         =>  '',
             'USERS_INDEX_MODAL_CHANGEPASS_TITLE'         =>  'Change password',
             'USERS_INDEX_MODAL_CHANGEPASS_MESSAGE'       =>  'Here you can change your password.',
        
         
         
         'USERS_'=> ''


     ]);