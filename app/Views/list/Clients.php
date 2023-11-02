<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="cards">
          <?php echo count($client)==0?"No Records Found":""; 
            foreach ($client as $client) : ?>
            <div class=" card [ is-collapsed ] ">
              <div class="card__inner [ js-expander ]"> <?php
                                                        $filename = "images/img10" . $client["logo"] . ".jpg";
                                                        if (file_exists($filename)) {
                                                          $url = "images/img0" . $client["logo"] . ".jpg";
                                                        } else {
                                                          $url = "https://image.flaticon.com/icons/svg/1181/1181088.svg";
                                                        }
                                                        ?>
                <img class="logo" src="<?php echo $url ?>">
                <span><a href="Clients/details/<?php echo $client["id"] ?>"><?php echo $client["name"] ?></a></span><br>
                <button><i class="fa fa-heart"></i></button>
                <button><i class="fa fa-envelope"></i></button>
              </div>
              <div class="card__expander">
                <i class="fa fa-close [ js-collapser ]"></i>
              </div>
            </div>

          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <?= $content ?>
      </div>
    </div>
  </div>
</div>

<script>
  var $cell = $('.card');

  //open and close card when clicked on card
  $cell.find('.js-expander').click(function() {

    var $thisCell = $(this).closest('.card');

    if ($thisCell.hasClass('is-collapsed')) {
      $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
      $thisCell.removeClass('is-collapsed').addClass('is-expanded');

      if ($cell.not($thisCell).hasClass('is-inactive')) {
        //do nothing
      } else {
        $cell.not($thisCell).addClass('is-inactive');
      }

    } else {
      $thisCell.removeClass('is-expanded').addClass('is-collapsed');
      $cell.not($thisCell).removeClass('is-inactive');
    }
  });

  //close card when click on cross
  $cell.find('.js-collapser').click(function() {

    var $thisCell = $(this).closest('.card');

    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    $cell.not($thisCell).removeClass('is-inactive');

  });
</script>