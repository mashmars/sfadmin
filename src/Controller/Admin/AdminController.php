<?php
namespace App\Controller\Admin;

use App\Controller\Admin\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="admin.")
 */
class AdminController extends BaseController
{
    /**
     * @Route("/admin/index", name="admin.index", options={"name"="管理员首页"})
     */
    public function index()
    {
        return $this->render("admin/admin/index.html.twig");
    }

    /**
     * @Route("/admin/add", name="admin.add", options={"name"="管理员新增"})
     */
    public function add()
    {
        return $this->render("admin/admin/add.html.twig");
    }

    /**
     * @Route("/admin/edit/{id<\d+>}", name="admin.edit", options={"name"="管理员编辑"})
     */
    public function edit()
    {
        return $this->render("admin/admin/edit.html.twig");
    }

    /**
     * @Route("/admin/password", name="admin.password", options={"name"="管理员修改密码"})
     */
    public function password()
    {
        return $this->render("admin/admin/password.html.twig");
    }
}