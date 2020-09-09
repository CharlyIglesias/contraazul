<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\MailService;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;



class DashboardController extends AbstractController{

/**
 * @Route("/", name="_home")
 * @Method({"GET"})
 */
    public function home(Request $request, SessionInterface $session, MailService $mailService)
    {
        
        // dd(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile")));
        $form = $this->createFormBuilder()
        ->add('Name',TextType::class,['label' => false, 'required' => true,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Nombre *'] ])
        ->add('Email',TextType::class,['label' => false, 'required' => true,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Email *'] ])
        ->add('Asunto',TextType::class,['label' => false, 'required' => true,
        'attr' => ['class' => 'form-control','maxlength' => 30, 'minlength' => 1, 'placeholder' => 'Asunto *'] ])
        ->add('Description', TextareaType::class, ['label' => false, 'required' => true,
                                            'attr' => ['class' => 'form-control','minlength' => 10, 'placeholder' => 'Descripcion *'] ])
        ->add('save',SubmitType::class,['label' => 'Enviar', 'attr' => ['class' => 'btn btn-primary']])
        ->getForm();
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('Name')->getData();
            $fromWho = $form->get('Email')->getData();
            $subject = $form->get('Asunto')->getData();
            $toWho = "contraazul1@gmail.com";
            $contentCustomer = $form->get('Description')->getData();
            $content = $this->renderView('/EmailTemplates/GenericTemplate.html.twig', ['content' => $contentCustomer, 'user' => $name]);
            
            $response = $mailService->sendEmail($fromWho, $subject, $_ENV['base_email'], $content);
            
        }
        // return $this->render('testDepresion.html.twig');
        return $this->render('landing.html.twig',[
            
            'isMobile' => is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"))
        ]);
    }

    /**
     * @Route("/testDepresion", name="_test_depresion")
     * @Method({"GET"})
     */
    public function testCognito(Request $request, SessionInterface $session)
    {
        return $this->render('testDepresion.html.twig');
    }

    /**
     * @Route("/sendMessage", name="_send_message")
     */
    public function sendMessage(Request $request, SessionInterface $session, MailService $mailService)
    {

        $name = $request->query->get('nameSender');
        $fromWho = $request->query->get('emailSender');
        $subject = $request->query->get('asunto');
        $toWho = "";
        $contentCustomer = $request->query->get('contentSender');
        $content = $this->renderView('/EmailTemplates/GenericTemplate.html.twig', ['content' => $contentCustomer, 'user' => $name]);
            
        $response = $mailService->sendEmail($fromWho, $subject, $_ENV['base_email'], $content);
        
        return new JsonResponse(["response" => $response]);
    }
}
?>