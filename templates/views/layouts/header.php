<?php
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">SKP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              
               
           
                <!-- User Account: style can be found in dropdown.less -->
                
                <li class="dropdown user user-menu">
                        
                       <?=(Yii::$app->user->isGuest?Html::a(
                                    'Login',
                                    ['/site/login'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat'] 
                                    )    
                                    :Html::a(
                                    Yii::$app->user->identity->username.'  (Log Out) ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', ]
                                )) ?>
                
                </li>

            </ul>
        </div>
    </nav>
</header>
