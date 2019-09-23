<?php

require('controller/frontendController.php');
require('controller/backendController.php');

$backend = new backend;
$frontend = new frontend;

if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'home') {
       $frontend->home();
    }

    elseif ($_GET['action'] =='login')
    {
        $backend->login();   
    }


    elseif ($_GET['action'] =='connected')
    {
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            $backend->inscription();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
        
    }

    
    elseif ($_GET['action'] == 'indexView')
    {
        $frontend->listPosts();
    }

    elseif ($_GET['action'] == 'contact')
    {
        $frontend->formContact();
    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontend->post();

        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    
    elseif ($_GET['action'] == 'addcoment') {
        if (isset($_GET['id']) > 0) {
            $frontend->commentAdd();
             header('Location: index.php?action=post&id=' . $_GET['id']);
        }
    }    

}
else {
    $frontend->home();
}
