<?php
namespace App\Controller\Admin;

use App\Controller\Admin\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/admin")
 */
class IndexController extends BaseController
{   
    /**
     * @Route("/", name="admin.index", options={"name"="后台首页", "ignore"=true})
     */
    public function index()
    {
        return $this->render('admin/index/index.html.twig');
    }
}