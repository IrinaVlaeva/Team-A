<?php include "templates/header.php" ?>

      <ul id="headlines">

<?php foreach ( $results['tests'] as $test ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $test->publicationDate)?></span><a href=".?action=viewTest&amp;testId=<?php echo $test->id?>"><?php echo htmlspecialchars( $test->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $test->summary )?></p>
        </li>

<?php } ?>

      </ul>

      <p><a href="./?action=archive">Test Archive</a></p>

<?php include "templates/footer.php" ?>

