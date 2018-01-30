<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
$menuItems =
        [
                    ['label' => 'Outlet' , 'icon' =>  'address-card-o', 'url' => ['/outlet/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Customer' , 'icon' =>  'user-o', 'url' => ['/customer/'],'visible' => !Yii::$app->user->isGuest],
        
                    ['label' => 'Ubah Password' , 'icon' =>  'pencil-square-o', 'url' => ['/site/request-password-reset'],'visible' => !Yii::$app->user->isGuest],
    
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'user-circle',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route' , 'icon' =>  'user', 'url' => ['/mimin/route/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role' , 'icon' =>  'user', 'url' => ['/mimin/role/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User' , 'icon' => 'user', 'url' => ['/user/'],'visible' => !Yii::$app->user->isGuest],
                   ]],
                 ['label' => 'Resi' , 'icon' =>  'gift', 'url' => ['/resi/'],'visible' => !Yii::$app->user->isGuest],

                 ['label' => 'Penerimaan Resi' , 'icon' =>  'gift', 'url' => ['/resi/terima'],'visible' => !Yii::$app->user->isGuest],
   
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
    <div class="user-panel">
    <div class="pull-left image">
    <?php echo Html::img('@web/img/160_F_79844335_hUetAJF19AyrBTSkcoSPlw45SuQTnGPK.jpg') ?> 
 
    </div>
    <div class="pull-left info"><p><?=Yii::$app->user->identity->username?></p>
    <?=Html::a(
                                    '<i class="fa fa-circle text-success">  Log Out </i> ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', ]
                                )?>
    </div>
    
    </div>
     <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
