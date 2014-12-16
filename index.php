<?php

ini_set('display_errors', '1');
session_start();

require 'model/database.php';
require 'model/navigation.php';
require 'model/users.php';
require 'model/comments.php';

include 'view/header.php';

$action = strtolower(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));

switch ($action) {

    case 'about' :
        include 'view/about.php';
        break;

    case 'alina' :
        include 'view/family/alina.php';
        break;

    case 'brita' :
        include 'view/family/brita.php';
        break;

    case 'changerole':
        $userid = (int) filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_NUMBER_INT);
        $role = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);
        
        if (LoggedInUserIsAdmin() && $userid && $role)
        {
            UpdateUserRole($userid, $role);
        }
        
        header('Location: /?action=editusers');
        exit();
        
    case 'contact' :
        include 'view/contact.php';
        break;

    case 'deleteuser':
        $id = (int) filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        if (LoggedInUserIsAdmin() && $id)
        {
            DeleteUser($id);
        }
        
        header('Location: /?action=editusers');
        exit();
        
    case 'editusers':
        $page = (LoggedInUserIsAdmin()) ? 'view/editusers.php' : 'view/login.php';
        $users = GetAllUsers();
        include $page;
        break;
    
    case 'erik' :
        include 'view/family/erik.php';
        break;

    case 'family' :
        include 'view/family/familytree.php';
        break;

    case 'home' :
        include 'view/home.php';
        break;

    case 'lars' :
        include 'view/family/lars.php';
        break;

    case 'login' :
        include 'view/login.php';
        break;

    case 'loginsubmit':
        $email = filter_input(INPUT_POST, 'emaillogin', FILTER_SANITIZE_EMAIL);
	    $password = filter_input(INPUT_POST, 'passwordlogin', FILTER_SANITIZE_STRING);
        if (LoginUser($email, $password)) {
            header('Location: /?action=menu');
            exit();
        }
        
        include 'view/login.php';
        break;
        
    case 'logout':
        session_destroy();
        $_SESSION = array();
        header('Location: /');
        exit();
        break;
    
    case 'menu':
        $page = (CheckSession()) ? 'view/menu.php' : 'view/login.php';
        include $page;
        break;
    
    case 'myinfo':
        $page = 'view/login.php';
        
        if ($userId = GetLoggedInUserId()) 
        {
            $page = 'view/myinfo.php';
            $user = GetUser($userId);
        }
        
        include $page;
        break;
        
    case 'myra' :
        include 'view/family/myra.php';
        break;

    case 'nils' :
        include 'view/family/nils.php';
        break;

    case 'postcomment':
        $itemId = (int) filter_input(INPUT_POST, 'itemId', FILTER_SANITIZE_NUMBER_INT);
        if ($userId = GetLoggedInUserId())
        {
            $text = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        
            if ($itemId && $text)
            {
                SaveComment($itemId, $userId, $text);
            }
        }
        
        $item = GetItemById($itemId);
        $comments = GetCommentsWithUsersForItem($itemId);
        include 'view/recipes.php';
        break;
        
    case 'recipes' :
        include 'view/recipes.php';
        break;
    
    case 'registersubmit':
        $regFirst = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $regLast = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $regmail = filter_input(INPUT_POST, 'emailreg', FILTER_SANITIZE_EMAIL);
        $regpass1 = filter_input(INPUT_POST, 'passwordreg1', FILTER_SANITIZE_STRING);
        $regpass2 = filter_input(INPUT_POST, 'passwordreg2', FILTER_SANITIZE_STRING);
        $message = '';
        
        if (RegisterUser($regFirst, $regLast, $regmail, $regpass1, $regpass2, $message)) {
            header('Location: /?action=menu');
            exit();
        }
        
        include 'view/login.php';
        break;
        
    case 'siteplan' :
        include 'view/siteplan.php';
        break;

    case 'updateinfo':
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $regFirst = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $regLast = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        
        if ($userId = GetLoggedInUserId()) 
        {
            $page = 'view/myinfo.php';
            
            if ($email && $regFirst && $regLast) 
            {
                UpdateUserInfo($userId, $email, $regFirst, $regLast);
                $user = GetUser($userId);
                $message = 'User Info Updated.';
            }
            else
            {
                $message = 'Please fill in all information to update.';
            }
        }
        else
        {
            $page = 'view/login.php';
        }
        
        include $page;
        break;
    
    case 'updatepassword':
        $oldpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $newpassword2 = $_POST['repeatpassword'];
        $message = '';
        
        if ($newpassword == $newpassword2)
        {
            $validMessage = '';
            if (ValidatePassword($newpassword, $validMessage))
            {
                if (ValidateOldPassword($oldpassword))
                {
                    UpdateUserPassword($newpassword);
                    $message = 'Password Updated';
                }
                else
                {
                    $message = 'The old password did not match.';
                }
            }
            else
            {
                $message = $validMessage;
            }
        }
        else
        {
            $message = "The new passwords do not match";
        }
        
        if ($userId = GetLoggedInUserId()) 
        {
            $page = 'view/myinfo.php';
            $user = GetUser($userId);
        }
  
        include 'view/myinfo.php';
        break;
        
    default :
        include 'view/home.php';
}

include 'view/footer.php';

