<?php include "templates/include/header.php" ?>

      <h1>Test Archive</h1>

      <ul id="headlines" class="archive">

<?php foreach ( $results['tests'] as $test ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F Y', $test->publicationDate)?></span><a href=".?action=viewTest&amp;testId=<?php echo $test->id?>"><?php echo htmlspecialchars( $test->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $test->summary )?></p>
        </li>

<?php } ?>

      </ul>

      <p><?php echo $results['totalRows']?> test<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/footer.php" ?>

