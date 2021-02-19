<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/25/2019
 * Time: 9:28 PM
 */

namespace crocodicstudio\crudbooster\controllers;


use crocodicstudio\crudbooster\exceptions\CBValidationException;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;

class DeveloperMailController extends Controller
{
    private $view = "crudbooster::dev_layouts.modules.mail";

    public function getIndex() {
        $data = ['page_title'=>'Mail Configuration'];
        return view($this->view.".config",$data);
    }

    public function postSave()
    {
        setEnvironmentValue([
            "MAIL_MAILER"=>request("MAIL_DRIVER"),
            "MAIL_DRIVER"=>request("MAIL_DRIVER"),
            "MAIL_HOST"=>request("MAIL_HOST"),
            "MAIL_PORT"=>request("MAIL_PORT"),
            "MAIL_USERNAME"=>request("MAIL_USERNAME"),
            "MAIL_PASSWORD"=>request("MAIL_PASSWORD"),
            "MAIL_ENCRYPTION"=>request("MAIL_ENCRYPTION")
        ]);

        return cb()->redirectBack("Mail configuration has been updated!","success");
    }

    public function getTemplates(){
        $data = ['page_title'=>'Mail Templates'];
        $data['templates'] = cb()->findAll('cb_mail_templates');

        return view($this->view.".templates",$data);
    }

    public function getAddTemplate(){
        $data = [
            'page_title'=>'Add New Template',
            'form_title'=>'Add Data',
            'cmd'=>'ADD'
        ];
        return view($this->view.".template_form",$data);
    }

    public function postAddTemplate(){

        try {
            cb()->validation([
                "name" => "required|max:255", 
                "slug" => "required|max:255|unique:cb_mail_templates", 
                "content" => "required",
                "from_name" => "required|max:255",
                "from_email" => "required|max:255",
                "subject" => "required|max:255"
            ]);

            DB::table('cb_mail_templates')->insert([
                'name' => request('name'),
                'slug' => request('slug'),
                'content' => request('content'),
                'from_name' => request("from_name"),
                'from_email' => request("from_email"),
                'cc' => request("cc"),
                'bcc' => request("bcc"),
                'subject' => request("subject")
            ]);

            return cb()->redirect(cb()->getDeveloperPath('mail/templates'), "Template added successfully!", "success");

        } catch (CBValidationException $e) {
            return cb()->redirectBack($e->getMessage());
        }
    }

    public function getEditTemplate($id){
        $data = [
            'page_title'=>'Edit New Template',
            'form_title'=>'Edit Data',
            'cmd'=>'EDIT',
            'template'=>cb()->find('cb_mail_templates', $id)
        ];
        return view($this->view.".template_form",$data);
    }

    public function postEditTemplate($id){

        try {
            cb()->validation([
                "name" => "required|max:255", 
                "slug" => "required|max:255|unique:cb_mail_templates,id,".$id, 
                "content" => "required",
                "from_name" => "required|max:255",
                "from_email" => "required|max:255",
                "subject" => "required|max:255"
            ]);

            cb()->update('cb_mail_templates', $id, [
                'name' => request('name'),
                'slug' => request('slug'),
                'content' => request('content'),
                'from_name' => request("from_name"),
                'from_email' => request("from_email"),
                'cc' => request("cc"),
                'bcc' => request("bcc"),
                'subject' => request("subject")
            ]);

            return cb()->redirect(cb()->getDeveloperPath('mail/templates'), "Template updated successfully!", "success");

        } catch (CBValidationException $e) {
            return cb()->redirectBack($e->getMessage());
        }
    }    


    public function getDeleteTemplate($id){
        try {
            cb()->delete('cb_mail_templates', $id);
            return cb()->redirect(cb()->getDeveloperPath('mail/templates'), "Template deleted successfully!", "success");

        } catch (CBValidationException $e) {
            return cb()->redirectBack($e->getMessage());
        }
    }
}