<?php
/**
 * CrudCommand class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @version $Id: CrudCommand.php 1678 2010-01-07 21:02:00Z qiang.xue $
 */

/**
 * CrudCommand generates code implementing CRUD operations.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CrudCommand.php 1678 2010-01-07 21:02:00Z qiang.xue $
 * @package system.cli.commands.shell
 * @since 1.0
 */
Yii::import('system.cli.commands.shell.CrudCommand');
class OCrudCommand extends CrudCommand 
{
    public function getHelp()
    {
        return str_replace('crud','ocrud',parent::getHelp());
    }
    public function run($args)
    {
        $this->templatePath = dirname(__FILE__) . '/ocrud';
        parent::run($args);
    }
    
    public function generateInputField($modelClass,$column)
    {
        if($column->type==='boolean'){
            return "echo \$form->activeCheckBox(\$model,'{$column->name}')";
        } else if(stripos($column->dbType,'text')!==false){
            return "echo \$form->activeTextArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
        } else if(strtoupper($column->dbType) == 'DATE'){
            return "echo \$form->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>\$model,
                                'name'=>'{$modelClass}[{$column->name}]',
                                'value'=>\$model->{$column->name},
                                'options'=>array(
                                    'dateFormat' => 'yy-mm-dd'
                                ),
                            ));";
        } else if($column->isForeignKey) {
            $model=CActiveRecord::model($modelClass);
            $table=$model->getTableSchema();
            $fk = $table->foreignKeys[$column->name];
            $fmodel=CActiveRecord::model($fk[0]);
            $ftable=$fmodel->getTableSchema();
            $fcolumns=$fmodel->attributeNames();

            if($column->allowNull){
                return  "echo \$form->activeDropDownList(\$model,'{$column->name}',"
                        ."CHtml::listData({$fmodel->tableName()}::model()->findAll(), "
                        ."'{$ftable->primaryKey}', '{$fcolumns[1]}'),"
                        ."array('prompt'=>Yii::t('App', 'Choose...')))";
            }
            return  "echo \$form->activeDropDownList(\$model,'{$column->name}',"
                    ."CHtml::listData({$fmodel->tableName()}::model()->findAll(), "
                    ."'{$ftable->primaryKey}', '{$fcolumns[1]}'))";
        }
        else
        {
            if(preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
                $inputField='activePasswordField';
            else
                $inputField='activeTextField';

            if($column->type!=='string' || $column->size===null)
                return "echo \$form->{$inputField}(\$model,'{$column->name}')";
            else
            {
                if(($size=$maxLength=$column->size)>60)
                    $size=60;
                return "echo \$form->{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength))";
            }
        }
    }
    
    private function getModelRelation($column)
    {
        return str_replace('_id','',$column->name);
    }
    
}
