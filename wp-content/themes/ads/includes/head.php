<?php include(get_template_directory() . '/includes/meta.php'); ?>

<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <meta name="keywords" content="">
  <meta name="description" content="<?php echo $description ?>">
  <meta property="og:url" content="">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $title ?>">
  <meta property="og:description" content="<?php echo $description ?>">
  <meta property="og:site_name" content="">
  <meta property="og:image" content="">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $title ?>">
  <meta name="twitter:description" content="<?php echo $description ?>">
  <meta name="twitter:image" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
  <?php wp_head(); ?>
</head>