<?php 
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
//$dataProvider = new ActiveDataProvider(['query' => $model->getCarsOptions()->andFilterWhere(['category_options_id'=>2])]);
$cat = \frontend\models\AutoOptionsCategory::find()->all();
if($cat){
    $flag = true;
}else{
    $flag =false;
}
//print_r($dataProvider);
?>
<table class="table">
    <tr>
        <?php if($flag){
     foreach ($cat as $v) {?>
        <th><?=$v->name?></th>
    <?php }
        } ?>
    </tr>
    <tr>
        <?php
        if($flag){
            foreach ($cat as $v) {?>
        
        <td>
                <?php 
                $data = new ActiveDataProvider(['query' => $model->getCarsOptions()->andFilterWhere(['category_options_id'=>$v->id])]);
                if($data){
                    //print_r($data);
             echo   ListView::widget([
    'dataProvider' => $data,
    'itemView' => '_list',
    'options' => [
                    'tag' => 'ul',
                    'class' => '', 
                    'style' => 'padding-left: 0px;'
                ],
    'itemOptions' => [
                    'tag' => 'li',
                    'class' => '',
                ],
    'layout' => "{items}",
    'summary' => false,
    'emptyText' => false,
]);
                }?>
            </td>
            <?php
       }
        }
        ?> 
        
    </tr>
</table>


