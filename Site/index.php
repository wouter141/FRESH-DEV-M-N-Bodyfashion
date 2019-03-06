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
          <img src=".\components\images\image.png" alt="a">
        </figure>
      </figure>
    </div>
    <div class="mainBox">
      <div class="itemBoxes">
        <div class="boxes boxItem1">
        </div>
        <div class="boxes boxItem2">
        </div>
        <div class="boxes boxItem3">
        </div>
      </div>
    </div>

    <?php include('./components/Footer.php'); ?>
  </body>
</html>
