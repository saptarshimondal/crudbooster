<?php

namespace crocodicstudio\crudbooster\helpers;


use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\controllers\scaffolding\ColumnSingleton;
use Illuminate\Support\Facades\DB;

class Module
{
    private $controller;
    private $controller_class;
    private $privilege;
    private $module;
    private $menu;

    public function __construct()
    {
        try {
            $routeArray = request()->route()->getAction();
            $this->controller = class_basename($routeArray['controller']);
            $this->controller = strtok($this->controller,"@");

            $className = "\\".$routeArray["namespace"]."\\".$this->controller;
            if(class_exists($className)) {
                $this->module = cb()->find("cb_modules",["controller"=>$this->controller]);
                if($this->module) {
                    $this->controller_class = new $className();
                    $this->menu = cb()->find("cb_menus",["cb_modules_id"=>$this->module->id]);
                    $this->menu = (!$this->menu)?cb()->find("cb_menus",["type"=>"path","path"=>request()->segment(2)]):$this->menu;
                    if($this->menu) {
                        $this->privilege = cb()->find("cb_role_privileges",[
                            "cb_menus_id"=>$this->menu->id,
                            "cb_roles_id"=>cb()->session()->roleId()
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return \crocodicstudio\crudbooster\controllers\scaffolding\singletons\ColumnSingleton
     */
    public function getColumnSingleton()
    {
        return app('ColumnSingleton');
    }

    public function getData($key) {
        if($this->controller_class) {
            $value = $this->controller_class->getData($key);
            if(isset($value)) {
                return $value;
            }
        }
        return null;
    }

    /**
     * @return CBController
     */
    public function getController() {
        return ($this->controller_class)?$this->controller_class:null;
    }

    public function getPageTitle()
    {
        return ($this->controller_class)?$this->controller_class->getData("page_title")?:cb()->getAppName():null;
    }

    public function getTable()
    {
        return ($this->controller_class)?$this->controller_class->getData("table"):null;
    }

    public function getPageIcon()
    {
        return ($this->controller_class)?$this->controller_class->getData('page_icon')?:$this->module->icon:null;
    }

    public function canBrowse() {
        if($this->privilege) {
            if($this->privilege->can_browse) return true;
            else return false;
        }else{
            return false;
        }
    }

    public function canCreate() {
        if($this->privilege) {
            if($this->privilege->can_create) return true;
            else return false;
        }else{
            return false;
        }
    }

    public function canRead() {
        if($this->privilege) {
            if($this->privilege->can_read) return true;
            else return false;
        }else{
            return false;
        }
    }

    public function canUpdate() {
        if($this->privilege) {
            if($this->privilege->can_update) return true;
            else return false;
        }else{
            return false;
        }
    }

    public function canDelete() {
        if($this->privilege) {
            if($this->privilege->can_delete) return true;
            else return false;
        }else{
            return false;
        }
    }

    public function addURL()
    {
        if($this->controller_class && method_exists($this->controller_class, 'getAdd')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@getAdd');
        }else{
            return null;
        }
    }

    public function addSaveURL()
    {
        if($this->controller_class && method_exists($this->controller_class, 'postAddSave')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@postAddSave');
        }else{
            return null;
        }
    }

    public function editURL($id = null)
    {
        if($this->controller_class && method_exists($this->controller_class, 'getEdit')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@getEdit')."/".$id;
        }else{
            return null;
        }
    }

    public function editSaveURL($id = null)
    {
        if(method_exists($this->controller_class, 'postEditSave')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@postEditSave')."/".$id;
        }else{
            return null;
        }
    }

    public function detailURL($id=null)
    {
        if($this->controller_class && method_exists($this->controller_class, 'getDetail')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@getDetail')."/".$id;
        }else{
            return null;
        }
    }

    public function deleteURL($id=null)
    {
        if($this->controller_class && method_exists($this->controller_class, 'getDelete')) {
            return action('\\App\\Http\\Controllers\\'.$this->controller.'@getDelete')."/".$id;
        }else{
            return null;
        }
    }

    public function url($path = null)
    {
        if($this->controller_class && method_exists($this->controller_class, 'getIndex')) {
            return trim(action('\\App\\Http\\Controllers\\'.$this->controller.'@getIndex').'/'.$path,'/');
        }else{
            return null;
        }
    }
}