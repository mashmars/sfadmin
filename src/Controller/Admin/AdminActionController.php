<?php
namespace App\Controller\Admin;

use App\Controller\Admin\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


/**
 * @Route("/admin", name="admin.")
 */
class AdminActionController extends BaseController
{
    /**
     * @Route("/action/index", name="admin_action.index", options={"name"="菜单功能列表"})
     */
    public function index()
    {
        return $this->render("admin/admin_action/index.html.twig");
    }

    /**
     * @Route("/action/add", name="admin_action.add", options={"name"="菜单功能新增"})
     */
    public function add()
    {
        return $this->render("admin/admin_action/add.html.twig");
    }

    /**
     * @Route("/action/edit/{id<\d+>}", name="admin_action.edit", options={"name"="菜单功能编辑"})
     */
    public function edit()
    {
        return $this->render("admin/admin_action/edit.html.twig");
    }

    /**
     * @Route("/action/check", name="admin_action.check", methods={"POST","GET"}, options={"name"="菜单功能更新"})
     */
    public function check(RouterInterface $router, Request $request, HttpClientInterface $httpClient)
    {       
        $routers = $router->getRouteCollection();
        
        try{
            $routerEnabled = [];
            foreach($routers as $routerName => $router) {              
                if (strpos($routerName,'_') === 0 
                    || strpos($routerName, 'public.') === 0 
                    || ($router->getOptions()['ignore'] ?? false))  continue;
                
                
                $routerEnabled[] = [
                    'name' => $router->getOptions()['name'] ?? '待定',
                    'router_name' => $routerName,
                    'router_short_name' => substr($routerName,0,strrpos($routerName,'.')),
                    'is_sub_menu'   => substr($routerName,strrpos($routerName,'.')+1) === 'index' ? 1 : 0,
                    'sorted_by' => 100,
                    'controller_action' => $router->getDefaults()['_controller'],
                    'is_enabled' => 1,
                ];                
            }

           
            $response = $httpClient->request('POST', $this->getParameter('api_action_collect'), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $request->getSession()->get("token"),
                ],
                'json' => $routerEnabled,
            ]);

            $decodedPayload = $response->toArray();
            if ($decodedPayload['code'] === 0) {
                return $this->json(['code'=>0, 'msg'=>'更新成功']);
            } else {
                return $this->json(['code'=>1, 'msg'=>$decodedPayload['msg']]);
            }
        }catch(Exception $e){            
            return $this->json(['code'=>1, 'msg'=>'更新失败']);
        }
    }

    /**
     * @Route("/action/api/{id<\d+>}", name="admin_action.api", options={"name"="功能api设置"})
     */
    public function api()
    {
        return $this->render("admin/admin_action/show_api.html.twig");
    }


}