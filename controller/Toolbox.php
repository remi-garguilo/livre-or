<?php

namespace Toolbox;

class Toolbox {

    public static function ajouterMessageAlerte(int $message)
    {
        if ($message === 1) {
            echo 'Vos mot de passes ne sont pas identiques';
        }
        if ($message === 2) {
            echo 'Login déjà existant';
        }
        if ($message === 3) {
            echo 'Login  ou mot de passes incorrect';
        }
        if ($message === 4) {
            echo "Informations incorrects";
        }
        if ($message === 5) {
            echo "Veuillez ne pas laisser de champs vide";
        }
    }
}