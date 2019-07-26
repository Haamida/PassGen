<?php


namespace App\Controller;



use App\Controller\Utility\Utilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    *@Route("/")
     */
    public function index(Request $request)
    {
        $csrfManager=Utilities::createCsrfManager();
        $validator=Utilities::createValidator();
        $formFactory = Forms::createFormFactoryBuilder()
            ->addExtension(new HttpFoundationExtension())
            ->addExtension(new ValidatorExtension($validator))
            ->addExtension(new CsrfExtension($csrfManager))
            ->getFormFactory();
       $form = $formFactory->createBuilder()
            ->add('password', TextType::class,[
                'required'=>false
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()){
            var_dump("I got here");
        }
        return $this->render('main.html.twig'
            , [
                'form' => $form->createView(),
            ]);
    }

}