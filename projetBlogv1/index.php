<?php
session_start();

require('controller/FrontendController.php');
require('controller/BackendController.php');

$backend = new Backend;
$frontend = new Frontend;


spl_autoload_register(function ($class)
{
    $files = array('controller/' . $class . '.php', 'model/' . $class . '.php');

    foreach ($files as $file)
    {
        if (file_exists($file))
        {
            require_once $file;
        }
    }
});

if (isset($_GET['action'])) {
    
    if ($_GET['action'] =='home') {
       $frontend->home();
    }

    elseif ($_GET['action'] =='register')
    {
        $backend->register();   
    }

    elseif ($_GET['action'] =='registerUser')
    {
        $backend->registerUser();
    }

    elseif ($_GET['action'] =='login')
    {
        $backend->login();   
    }

    elseif ($_GET['action'] == 'contact')
    {
        $frontend->formContact();
    }

    elseif ($_GET['action'] =='connexion')
    {
        $backend->connection(); 
    }

    elseif ($_GET['action'] =='deconnexion')
    {
        $backend->deconnexion();   
    }

    elseif ($_GET['action'] =='formPost')
    {
        $backend->formPost();   
    } 

    elseif ($_GET['action'] =='viewArticle')
    {
        $backend->viewPost();   
    } 

    elseif ($_GET['action'] =='editArticle')
    {
        $backend->editPost();   
    }  

    elseif ($_GET['action'] =='newPost')
    {
        $backend->newPost();   
    }  

     elseif ($_GET['action'] =='delete')
    {
        $backend->deletePost();   
    }  
    
    elseif ($_GET['action'] =='deleteComment')
    {
        $backend->deleteComment();   
    }  

   elseif ($_GET['action'] == 'indexView')
    {
        $frontend->listPosts();
    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontend->post();
        }
    }
    
    elseif ($_GET['action'] == 'addcoment') 
    {   
     $frontend->commentAdd();
     header('Location: index.php?action=post&id=' . $_GET['id']);
    }

     elseif ($_GET['action'] == 'report') 
    {   
     $frontend->report();
     header('Location: index.php?action=post&id=' . $_GET['post']);
    }

     elseif ($_GET['action'] == 'Contact') 
    {   
     $frontend->contact();

    }
}
else {
    $frontend->home();
}

