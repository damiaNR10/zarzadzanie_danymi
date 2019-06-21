<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function indexAction($type=null, $message=null)
    {
      return $this->render('login/index.html.twig',[
        'controller_name' => "LoginController",
         'type' => $type,
         'message' => $message
      ]);
    }
    
    /**
     * @Route("/login", name="login_action")
     * @Method({"POST"})
     */
    public function login(Request $request)
    {
    }
    
    /**
     * @Route("/logout", name="logout")
     * @Method("GET")
     */
    public function logout(Request $request)
    {
        return $this->indexAction();
    }
    
    /**
     * @Route("/user/aaa", name="test")
     */
    public function testAction(Request $request)
    {
      return $this->render('login/index.html.twig',[
        'controller_name' => "LoginController",
         'type' => 'asdasdsa',
         'message' => 'asasdsad'
      ]);
    }
    
    /**
     * @Route("/register", name="register")
     * @Method({"GET"})
     */
    public function registerView($error="")
    {
        return $this->render('register/index.html.twig',[
           'controller_name' => "LoginController",
            'error' => $error
        ]);
    }
    
    /**
     * @Route("/register", name="register_action")
     * @Method({"POST"})
     */
    public function registerAction(Request $request)
    {
       $data = $request->request->all();
       if(!isset($data['password']) || !isset($data['password-confirm']) || !isset($data['email'])) {
           return $this->registerView('Nie ustawiono danych');
       }
       if($data['password'] !== $data['password-confirm']) {
           return $this->registerView('Hasła różnią się');
       }
       $existing = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $data['email']]);
       if($existing) {
          return $this->registerView('Użytkownik o podanym mailu juz istnieje');
       }
       $hash = password_hash($data['password'], PASSWORD_DEFAULT);
       $user = new User();
       $user->setUsername($data['email']);
       $user->setPassword($hash);
       $this->getDoctrine()->getManager()->persist($user);
       $this->getDoctrine()->getManager()->flush();
       return $this->indexAction("success", "Konto zostało utworzone.");
    }
}
