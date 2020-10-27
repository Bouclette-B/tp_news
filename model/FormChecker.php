<?php
namespace App\model;

class FormChecker
{
    public function checkForm(array $writeNewsForm, string& $errorMsg) : bool
    {
        if(!$writeNewsForm['author'])
        {
            $errorMsg = "Il te manque le nom d'auteur.";
            return false;
        }

        if(!$writeNewsForm['title'])
        {
            $errorMsg = "Il te manque un titre.";
            return false;
        }

        if(!$writeNewsForm['content'])
        {
            $errorMsg = "Il te manque un contenu.";
            return false;
        }
        return true;
    }

}