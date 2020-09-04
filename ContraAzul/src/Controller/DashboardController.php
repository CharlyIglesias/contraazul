<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\User;
// use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
// use Symfony\Component\HttpFoundation\Session\SessionInterface;
// use App\Entity\Company;

// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// use Symfony\Component\Form\Extension\Core\Type\FileType;
// use Symfony\Component\HttpFoundation\File\Exception\FileException;
// use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractController{
/**
 * @Route("/", name="_home")
 * @Method({"GET"})
 */
    public function home()
    {
        // $this->denyAccessUnlessGranted(['ROLE_USER', 'ROLE_SUPER_ADMIN', 'ROLE_ADMIN']);

     

        return $this->render('landing.html.twig');
    }
}
?>