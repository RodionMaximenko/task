<html>
    <?php include(ROOT . '/views/global/head.php'); ?>
<body>
<!--    Middle block for Auth-->
    <div class="main-wrapper">
        <a href="/comments" id="to-comments">Страница сообщений</a>
        <div
            id="uLogin"
            data-ulogin="
                display=panel;
                theme=flat;
                fields=first_name,last_name,photo,photo_big,city,uid;
                providers=vkontakte,facebook,googleplus;
                hidden=;
                redirect_uri=%2Fauth;mobilebuttons=0;">
        </div>
    </div>
<!--    End Middle block for Auth-->
<!--    Script for Auth from 'ulogin.ru'-->
    <script src="//ulogin.ru/js/ulogin.js"></script>
<!--    End Script for Auth from 'uligin.ru'-->
</body>
</html>
