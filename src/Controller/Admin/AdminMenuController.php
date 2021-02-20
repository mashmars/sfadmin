<?php
namespace App\Controller\Admin;

use App\Controller\Admin\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="admin.")
 */
class AdminMenuController extends BaseController
{
    /**
     * @Route("/menu/index", name="admin_menu.index", options={"name"="菜单列表"})
     */
    public function index()
    {
        return $this->render("admin/admin_menu/index.html.twig");
    }

    /**
     * @Route("/menu/add", name="admin_menu.add", options={"name"="菜单新增"})
     */
    public function add()
    {
        return $this->render("admin/admin_menu/add.html.twig");
    }

    /**
     * @Route("/menu/edit/{id<\d+>}", name="admin_menu.edit", options={"name"="菜单编辑"})
     */
    public function edit()
    {
        return $this->render("admin/admin_menu/edit.html.twig");
    }

    /**
     * @Route("/menu/action/show/{id<\d+>}", name="admin.admin_menu.showAction", options={"name"="子菜单功能"})
     */
    public function show()
    {     
        return $this->render('admin/admin_menu/show_action.html.twig');
    }

}