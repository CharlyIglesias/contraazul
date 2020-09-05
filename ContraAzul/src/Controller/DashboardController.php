<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    public function home(Request $request, SessionInterface $session)
    {
        
        // dd(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile")));
        $form = $this->createFormBuilder()
        ->add('Name',TextType::class,['label' => false,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Nombre *'] ])
        ->add('Email',TextType::class,['label' => false,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Email *'] ])
        ->add('Asunto',TextType::class,['label' => false,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Asunto '] ])
        ->add('Description', TextareaType::class, ['label' => false,
                                            'attr' => ['class' => 'form-control','minlength' => 10, 'placeholder' => 'Descripcion '] ])
        ->add('save',SubmitType::class,['label' => 'Enviar', 'attr' => ['class' => 'btn btn-primary']])
        ->getForm();
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }
        return $this->render('landing.html.twig',[
            'form'=> $form->createView(),
            'isMobile' => is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"))
        ]);
        
    }
}
?>