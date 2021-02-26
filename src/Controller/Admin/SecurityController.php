<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Route("/admin")
 */
class SecurityController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/login", name="admin.login", options={"name"="后台登陆", "ignore"=true})
     */
    public function login()
    {
        return $this->render('admin/security/login.html.twig');
    }

    /**
     * @Route("/token", name="admin.token", options={"name"="", "ignore"=true})
     */
    public function token(Request $request, SessionInterface $session)
    {
        $session->set("token", $request->request->get("token"));
        $session->set("username", $request->request->get("username"));
        return $this->json(['code'=>0, 'msg'=>'登陆成功', 'data'=>'']);
    }

    /**
     * @Route("/logout", name="admin.logout", options={"name"="", "ignore"=true})
     */
    public function logout(SessionInterface $session)
    {   
        $session->clear();
        return $this->json(['code'=>0, 'msg'=>'退出成功', 'data'=>'']);
    }
}