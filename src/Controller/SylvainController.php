<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 31/10/19
 * Time: 10:04
 */

namespace App\Controller;

class SylvainController extends AbstractController
{
    public function sylvain()
    {
        return $this->twig->render('Sylvain/index.html.twig');
    }
}
