<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/15/2019
 * Time: 11:44 PM
 */

namespace crocodicstudio\crudbooster\controllers\traits;

use Illuminate\Support\Facades\Validator;
use crocodicstudio\crudbooster\exceptions\CBValidationException;

trait Validation
{

    /**
     * @throws CBValidationException
     */
    private function validation()
    {
        $columns = columnSingleton()->getColumns();

        $validation = [];
        $messages = [];

        foreach ($columns as $key => $value) {
            if(columnSingleton()->getColumn($key)->getValidation()){
                $validation[columnSingleton()->getColumn($key)->getName()] = columnSingleton()->getColumn($key)->getValidation();
            }

            if(is_array(columnSingleton()->getColumn($key)->getValidationMessages())){
                foreach (columnSingleton()->getColumn($key)->getValidationMessages() as $rule => $message) {
                    $messages[columnSingleton()->getColumn($key)->getName().".".$rule] = $message;
                }
            }
        }

        if(count($validation)) {
            $validator = Validator::make(request()->all(), $validation, $messages);
            if ($validator->fails()) {
                $message = $validator->messages();
                $message_all = $message->all();
                throw new CBValidationException(implode(', ',$message_all));
            }
        }
    }

}