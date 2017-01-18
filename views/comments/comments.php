<html>
    <?php include(ROOT . '/views/global/head.php'); ?>
    <body>
        <div class="ui two column centered grid">
            <div class="column feed-comments">
                <?php if($auth == true): ?>
                <button class="ui default button exit-button" onclick="exit()">Выйти</button>
                <?php endif; ?>
                <?php if($auth == true): ?>
                <div class="add-comment-wrap">
                    <form action="add/message" method="post">
                        <textarea name="comment" id="comment-text" placeholder="Введите текст сообщения"></textarea>
                        <input type="hidden" name="parent_comment" id="parrent_comment" value="NULL">
                        <span id="answer"></span>
                        <button class="ui primary button" id="comment-button" type="submit">
                            Отправить
                        </button>
                    </form>
                </div>
                <?php else: ?>
                <div class="error-auth">
                    Вы не авторизованы!!! <br>
                    “Для добавления и комментирования сообщений выполните вход” <br>
                    <a href="/">Перейдите на страницу авторизации</a>
                </div>
                <?php endif; ?>
                <div class="ui feed">

                    <?php foreach(Comments::getMessages() as $item): ?>
                    <div class="event">
                        <div class="label">
                            <?php if ($item['photo'] == ''): ?>
                                <img src="/templates/images/notImage.jpg">
                            <?php else: ?>
                                <img src="<?php print_r($item['photo']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <div class="summary">
                                <?php print_r($item['last_name']); ?>
                                <?php print_r($item['first_name']); ?>
                            </div>
                            <?php print_r($item['comment']); ?>
                            <?php if($auth): ?>
                            <br>
                            <a onclick="writeSubComment(
                            <?php print_r($item['id']); ?>,
                                '<?php print_r($item['first_name']); ?>',
                                '<?php print_r($item['last_name']); ?>'
                                )">
                                Ответить
                            </a>
                            <a href="/comments/delete/<?php print_r($item['id']); ?>">&nbsp; Удалить</a>
                            <?php endif; ?>
                            <?php foreach (Comments::getSubComment($item['id']) as $value): ?>

                            <div class="sub-comment">
                                <div class="sub-comment-head">
                                    <?php print_r($value['last_name']); ?>
                                    <?php print_r($value['first_name']); ?>
                                </div>
                                <?php print_r($value['comment']); ?>
                                <?php if($auth): ?>
                                <br>
                                <a onclick="writeSubComment(
                                    <?php print_r($value['id']); ?>,
                                    '<?php print_r($value['first_name']); ?>',
                                    '<?php print_r($value['last_name']); ?>'
                                )">
                                    Ответить
                                </a>
                                <a href="/comments/delete/<?php print_r($value['id']); ?>">&nbsp; Удалить</a>
                                <?php endif; ?>
                                <?php foreach (Comments::getSubComment($value['id']) as $sub): ?>
                                <div class="sub-comment">
                                    <div class="sub-comment-head">
                                        <?php print_r($sub['last_name']); ?>
                                        <?php print_r($sub['first_name']); ?>
                                    </div>
                                    <?php print_r($sub['comment']); ?>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <?php endforeach; ?>
                            <div class="line"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <script src="/templates/js/comments/comments.js"></script>

    </body>
</html>