<?php
namespace App\Controller\Admin;

use App\Controller\Admin\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="admin.")
 */
class AdminRoleController extends BaseController
{
    /**
     * @Route("/role/index", name="admin_role.index", options={"name"="管理员角色列表"})
     */
    public function index()
    {
        return $this->render("admin/admin_role/index.html.twig");
    }

    /**
     * @Route("/role/add", name="admin_role.add", options={"name"="管理员角色新增"})
     */
    public function add()
    {
        return $this->render("admin/admin_role/add.html.twig");
    }

    /**
     * @Route("/role/edit/{id<\d+>}", name="admin_role.edit", options={"name"="管理员角色编辑"})
     */
    public function edit()
    {
        return $this->render("admin/admin_role/edit.html.twig");
    }

    /**
     * @Route("/role/auth/{id<\d+>}", name="admin_role.auth", options={"name"="管理员角色授权"})
     */
    public function auth()
    {
        return $this->render("admin/admin_role/auth.html.twig");
    }

}