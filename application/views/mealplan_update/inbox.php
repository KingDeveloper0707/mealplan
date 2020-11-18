<div class='' id="inbox-page">
    <div class='top-nav-section' style='height: 100px;'></div>
    <hr class="my-0">

    <div class="d-flex flex-row">
        <div class="emails-wrapper">
            <div class="list-group" id="list-tab" role="tablist">
                <?php
//                echo json_encode($emails);
                $is_first = true;
                foreach ($emails as $email) {
                    if($email->action == '2') {
                        continue;
                    }
                    ?>
                    <a class="list-group-item list-group-item-action <?php
                    if ($is_first) {
                        echo "active ";
                        $is_first = false;
                    }
                    if( $email->action != '1') {
                        echo 'unread';
                    }
                    ?>" id="list-email-<?= $email->id; ?>-list" data-toggle="list" href="#list-email-<?= $email->id; ?>" role="tab" aria-controls="<?= 'email-' . $email->id; ?>" data-email-id="<?= $email->id; ?>">
                        <p class="mb-0">
                            <span class="title"><?= $email->title; ?></span>
                            <span class="create_time float-right"><?= $email->create_time; ?></span>
                        </p>
                        <p class='mb-0'><small><?= substr(strip_tags($email->content), 0, 30); ?>...</small></p>
                    </a>
                <?php } ?>

            </div>
        </div>
        <div class="email-wrapper p-3">
            <div class="tab-content" id="nav-tabContent">
                <?php
                $is_first = true;
                foreach ($emails as $email) {
                    ?>
                    <div class="tab-pane fade <?php
                    if ($is_first) {
                        echo "show active";
                        $is_first = false;
                    }
                    ?>" id="list-email-<?= $email->id; ?>" role="tabpanel" aria-labelledby="list-email-<?= $email->id; ?>-list" data-email-id="<?= $email->id; ?>">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="email-date mb-0"><?= $email->create_time; ?></p>
                            <button class="btn btn-primary float-right btn-delete">Delete</button>
                        </div>
                        <?= $email->content; ?>
                    </div>
                <?php } ?>
            </div>
            <!--div class="d-flex justify-content-between align-items-center mb-3">
                <p class="email-date mb-0">May 1, 2020</p>
                <button class="btn btn-primary">Delete</button>
            </div>
            <h3>Meal Next Week Is Unlocked!</h3>
            <p>Congratulations! A keto quick start guide is just unlocked. Click <a href="https://google.com" target="_blank">link to download for free</a></p>
            <p>There's a lot of people who need to lose weight FAST for a wedding, school reunion, summer vacation, to impress someone special = or just want to lose weight really, really quickly!</p>
            <p>And while we can never promise to double or triple your weight loss results, we can help unlock the key to fast, effective weight loss - and give you the same fat-burning advantage our most successful customers use to get the following transformational results: <a href='https://google.com' target='_blank'>See Transformation</a></p>
            <p>I'll tell you about how we're going to fire up your metabolism and get you burning fat 24 hours a day, 7 days a week in just a second.</p-->
        </div>
    </div>
    <!--    <div class="container">
            <div class="row">
                <div class="col-5" style='width:320px; height:calc(100vh - 140px); overflow:auto;'>
    
                </div>
                <div class="col-7">
                    
                </div>
            </div>
        </div>-->
</div>
