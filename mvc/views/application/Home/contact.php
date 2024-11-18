<div class="page-wrapper">
    <?php
    if (isset($data)) {
        require_once "./mvc/views/" . $data["header"] . ".php";
    }
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__content hide-in-sd"
                 style="background-color: rgba(248, 78, 69, 15%);"
            >
                <div class="uk-container py-4">
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page text-center text-uppercase">
                            Liên hệ
                        </h2>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-8 col-md-3 mx-3 mb-5">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="p-5 rounded-circle lh-1 mb-4"
                                         style="background: rgba(248, 78, 69, 15%);">
                                        <i class="bi bi-telephone-fill fs-1"></i>
                                    </div>
                                    <h3 class="mb-3 text-uppercase">
                                        Số điện thoại
                                    </h3>
                                    <p class="text-break text-center">
                                        0123456789
                                    </p>
                                </div>
                            </div>
                            <div class="col-8 col-md-3 mx-3 mb-5">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="p-5 rounded-circle lh-1 mb-4"
                                         style="background: rgba(248, 78, 69, 15%);">
                                        <i class="bi bi-envelope-fill fs-1"></i>
                                    </div>
                                    <h3 class="mb-3 text-uppercase">
                                        Email
                                    </h3>
                                    <p class="text-break text-center">
                                        contact@omg.com
                                    </p>
                                </div>
                            </div>
                            <div class="col-8 col-md-3 mx-3 mb-5">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="p-5 rounded-circle lh-1 mb-4"
                                         style="background: rgba(248, 78, 69, 15%);">
                                        <i class="bi bi-geo-alt-fill fs-1"></i>
                                    </div>
                                    <h3 class="mb-3 text-uppercase">
                                        Địa chỉ
                                    </h3>
                                    <p class="text-break text-center">
                                        123 Đường ABC, Quận XYZ, TP. HCM
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-contacts-form">
                <div class="uk-section uk-container">
                    <div class="uk-grid justify-content-center" data-uk-grid>
                        <div class="uk-width-2-3@m">
                            <div class="section-title">
                                <h2 class="uk-h3 text-center fw-bold text-uppercase">Liên hệ nhanh với chúng tôi</h2>
                            </div>
                            <div class="section-content">
                                <form action="">
                                    <div class="uk-grid uk-grid-medium uk-child-width-1-2@s" data-uk-grid>
                                        <div>
                                            <label for="nameInput"></label>
                                            <input class="uk-input" id="nameInput" type="text" placeholder="Your Name"
                                                   required></div>
                                        <div>
                                            <label for="emailInput"></label>
                                            <input class="uk-input" id="emailInput" type="text" placeholder="Email"
                                                   required>
                                        </div>
                                        <div>
                                            <label for="phoneInput"></label>
                                            <input class="uk-input" id="phoneInput" type="text" placeholder="Phone"
                                                   required>
                                        </div>
                                        <div>
                                            <label for="subjectInput"></label>
                                            <input class="uk-input" id="subjectInput" type="text" placeholder="Subject"
                                                   required>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <label for="messageInput"></label>
                                            <textarea class="uk-textarea" id="messageInput" name="message"
                                                      placeholder="Message"
                                                      required></textarea>
                                        </div>
                                        <div class="text-end" style="width: 100%;">
                                            <input class="uk-button" type="submit" value="Send message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.496329047211!2d106.65719117480491!3d10.773246689375332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f265219560b%3A0x5c5dd04dfb3977cd!2zxJDhuqFpIGjhu41jIELDoWNoIEtob2EgVFAuSENNIC0gSOG7mWkgVHLGsOG7nW5nIEE1!5e0!3m2!1svi!2s!4v1715096206471!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

