<?php


namespace App\Controller;



use App\Controller\Utility\Utilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    *@Route("/")
     */
    public function index(Request $request)
    {
        $formFactory=Utilities::createConfiguredFormFactory();
       $form = $formFactory->createBuilder()
            ->add('password', TextType::class,[
                'required'=>false
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            return $this->render('main.html.twig'
                , [
                    'form' => $form->createView(),
                    'password'=>$this->generatePassword()
                ]);
        }
        return $this->render('main.html.twig'
            , [
                'form' => $form->createView(),
            ]);
    }
    private function generatePassword(){
        $password="";
        $range="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@!#$;:%";
        for ( $i=0;$i<16;$i++)
           $password=$password.substr ( $range ,mt_rand(0,strlen($range)-1), 1 );

        return $password;
    }

}