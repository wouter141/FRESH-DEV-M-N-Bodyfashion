<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php $title = 'Home'; ?>
    <?php $metaTags = 'tag1 tag2'; ?>
    <?php $currentPage = 'index'; ?>
    <?php include('./components/AllInclude.php'); ?>

  </head>
  <body>
    <div id="captioned-gallery">
      <figure class="slider">
        <figure>
          <img src=".\components\images\slider\image.png" alt="a">
        </figure>
        <figure>
          <img src=".\components\images\slider\image.png" alt="a">
        </figure>
        <figure>
          <img src=".\components\images\slider\image.png" alt="a">
        </figure>
        <figure>
          <img src=".\components\images\slider\image.png" alt="a">
        </figure>
    </div>
    <div class="mainBox">
      <div class="itemBoxes">
        <div class="boxes boxItem1">
          <img class="boxImages" src="./components/images/index.jpg" alt="">
        </div>
        <div class="boxes boxItem2">
          <img class="boxImages" src="./components/images/index2.jpg" alt="">
        </div>
        <div class="boxes boxItem3">
          <img class="boxImages" src="./components/images/index3.jpg" alt="">
        </div>
      </div>
    </div>

    <?php include('./components/Footer.php'); ?>
  </body>
</html>
