<section id="feature-jobs wow">
    <h3 class="text-center item-animation">Featured Jobs</h3>
    <div class="featured-jobs-home">
        <div class="featured-jobs-slide item-animation">
            <?php
            $url = "https://service.conecta.com.au/api/v1/jobs/maketing-site";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $resps = curl_exec($curl);
            // curl_close($curl);

            $json = json_decode($resps, true);

            // echo '<pre>';
            // var_dump($json["data"]);
            // echo '</pre>';
            foreach ($json["data"] as $item) { ?>
                <div class="jobs-box">
                    <p class="job-name f-16-medium"><?php echo $item['jobTitle']; ?></p>
                    <h4>
                        <?php if ($item['isNegotiable']) : ?>
                            <?php echo 'Negotiable'; ?>
                        <?php else : ?>
                            <?php if ($item['salaryFrom']) {
                                echo '$' . number_format($item['salaryFrom']);
                                echo ' - ';
                                echo '$' . number_format($item['salaryTo']);
                            } elseif ($item['salaryTo']) {
                                echo '$' . number_format($item['salaryTo']);
                            } else {
                                echo 'Negotiable';
                            } ?>
                        <?php endif; ?>
                    </h4>
                    <div class="address">
                        <p class="f-16-normal"><?php echo $item['location']['contentWithoutCity']; ?></p>
                        <a href="https://app.conecta.com.au/login" class="apply f-14-bold" title="Apply Now">Apply Now</a>
                    </div>
                </div>
            <?php }
            curl_close($curl); ?>
        </div>
    </div>
</section>