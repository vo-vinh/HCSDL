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
                        <p style="color: #F84E45; font-size: 50px; text-align: center">Tin tức</p>


                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="uk-margin-large-top uk-container">

                    <div class="uk-grid" data-uk-grid>

                        <?php
                        mysqli_data_seek($data["news"], 0);
                        while ($e = mysqli_fetch_assoc($data["news"])) {
                            ?>
                            <div class="uk-width-2-4@m">
                                <article class="article-intro">
                                    <div class="article-intro__image">
                                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                                             data-uk-slideshow>
                                            <ul class="uk-slideshow-items">
                                                <li><img src="<?php echo $e["img_url"] ?>" alt data-uk-cover></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="article-intro__body">
                                        <div class="article-intro__info">
                                            <div class="article-intro__author">
                                                <i class="fas fa-user"></i><span><?php echo $e["author"] ?></span>
                                            </div>
                                            <div class="article-intro__date">
                                                <i class="fas fa-calendar-alt"></i><span><?php echo $e["created_at"] ?></span>
                                            </div>
                                        </div>
                                        <h2 class="article-intro__title"><?php echo $e["header"] ?></h2>
                                        <div class="article-intro__content">
                                            <p><?php echo $e["intro"] ?></p>
                                        </div>
                                        <div class="article-intro__bottom">
                                            <div class="article-intro__tags">
                                                <i class="fas fa-tags"></i><span>TIN TỨC, NÔNG SẢN, TRÁI CÂY</span>
                                            </div>
                                            <div class="article-intro__more">
                                                <a class="uk-button"
                                                   href="<?php echo Utils\BASE_URL ?>/news/detail/<?php echo $e["id"] ?>">
                                                    Chi Tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>


                            </div>
                        <?php }

                        ?>
                    </div>
                </div>
            </div>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>