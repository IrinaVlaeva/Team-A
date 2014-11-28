<?php include "templates/header.php" ?>

      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['test']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['test']->summary )?></div>
      <div style="width: 75%;"><?php echo $results['test']->content?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['test']->publicationDate)?></p>

      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/footer.php" ?>

