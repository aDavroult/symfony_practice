<?php
 
namespace App\Controller;
 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 
 
class HomeController extends AbstractController{
 
    /**
    * @Route("/req", name="req")
    */
    public function req(Request $request)
    {
        return new Response ("<pre>". $request. "</pre>");
 
        // $id = $request->attributes->get('id');
    }
 
    /**
    * @Route("/index", name="index")
    */
    public function index()
    {
        return $this->render("default/index.html.twig");
    }
 
    /**
    * @Route("/redirect", name="redirect")
    */
    public function redirection()
    {
        //rediriger depuis un template
 
        return $this->render("default/test.html.twig");
    }
 
    /**
    * @Route("/lucky", name="lucky")
    */
    public function number()
    {
        $number = random_int(0, 100);
 
        return $this->render('default/number.html.twig', [
            'number' => $number,
        ]);
    }
   
    /**
    * @Route("/session-add-{name}-{content}", name="session")
    */
    public function session($name, $content, Request $request)
    {
        // creation d'une session
        $name = $request->attributes->get('name');
        $content = $request->attributes->get('content');
        $session = $request->getSession();
        $session->set($name, $content);
        return new Response ("<body>session ajoutée</body>");

    }

    /**
    * @Route("/session-del", name="session-del")
    */
    public function sessionDel()
    {
        session_destroy();
        return new Response ("<body>session détruite</body>");
    }

    /**
    * @Route("/sessions", name="sessions")
    */
    public function sessions(Request $request)
    {
        $session = $request->getSession();
        $display = '';
        foreach($session as $key => $value){
            $display = $display.'<p> La session ('.$key.') contient: ('.$value.')</p>';
        }

        //return new Response($display);

        return $this->render("default/sessions.html.twig", [
    }

    /**
    * @Route("/sessions", name="sessions")
    */
}