<div class="page-wrapper">
    <?php
    if (isset($data)) {
        require_once "./mvc/views/" . $data["header"] . ".php";
    }
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd" style="background-color: rgba(248, 78, 69, 15%); height: 300px;">
            </div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page" style="color: #F84E45; font-size: 50px; text-align: center">Bài
                            viết</h2>
                    </div>
                </div>
            </div>
            <?php
            while ($row = mysqli_fetch_assoc($data["id"])) {
                $content = str_replace("\n", "<br>", $row["content"]);
                ?>
                <div class="page-content">
                    <div class="uk-margin-large-top uk-container uk-container-small">
                        <div class="article-full__info" style="justify-content:space-between !important">
                            <a href="<?php echo Utils\BASE_URL ?>/news" style="text-decoration:none">
                                <i class="fas fa-arrow-left"></i>
                                <span style="color: #f84e45">Back to all news</span>
                            </a>
                        </div>
                        <article class="article-full">

                            <div class="article-full__info">
                                <div class="article-full__author">
                                    <i class="fas fa-user "></i><span><?php echo $row["author"] ?></span>
                                </div>
                                <div class="article-full__date">
                                    <i class="fas fa-calendar-alt"></i><span><?php echo $row["created_at"] ?></span>
                                </div>
                            </div>
                            <div class="article-full__image">
                            </div>
                            <div>
                                <h1><b><?php echo $row["header"] ?></b></h1>
                                <p style="font-size: 16.5px; font-weight: bold; text-align: justify;">
                                    <?php echo $row["intro"] ?></p>
                                <div><img class="uk-width-1-1" src="<?php echo $row["img_url"] ?> " alt="article">
                                </div>
                                <p><?php echo $content ?></p>
                            </div>
                        </article>
                    </div>
                </div>
                <?php
            }
            ?>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>