<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
$menuItems =
        [
    
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'user-circle',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route' , 'icon' =>  'user', 'url' => ['/mimin/route/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role' , 'icon' =>  'user', 'url' => ['/mimin/role/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User' , 'icon' => 'user', 'url' => ['/mimin/user/'],'visible' => !Yii::$app->user->isGuest],
                   ]]
                                 ,
                ];     
                
 if (!Yii::$app->user->isGuest)
{             
 if (Yii::$app->user->identity->username !== 'admin') 
{
  $menuItems = Mimin::filterMenu($menuItems);
};
}        
?>
<aside class="main-sidebar">

     
    <section class="sidebar">
  <?php echo Html::img('@web/image/logo.png') ?> 
     <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
