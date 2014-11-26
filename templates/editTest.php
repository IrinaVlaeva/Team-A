<?php include "templates/header.php" ?>

      <div id="adminHeader">
        <h2>Widget News Admin</h2>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>

      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="testId" value="<?php echo $results['test']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="title">Test Title</label>
            <input type="text" name="title" id="title" placeholder="Name of the test" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['test']->title )?>" />
          </li>

          <li>
            <label for="summary">Test Summary</label>
            <textarea name="summary" id="summary" placeholder="Brief description of the test" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['test']->summary )?></textarea>
          </li>

          <li>
            <label for="content">Test Content</label>
            <textarea name="content" id="content" placeholder="The HTML content of the test" required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars( $results['test']->content )?></textarea>
          </li>

          <li>
            <label for="publicationDate">Publication Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['test']->publicationDate ? date( "Y-m-d", $results['test']->publicationDate ) : "" ?>" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['test']->id ) { ?>
      <p><a href="admin.php?action=deleteTest&amp;testId=<?php echo $results['test']->id ?>" onclick="return confirm('Delete This Test?')">Delete This Test</a></p>
<?php } ?>

<?php include "templates/footer.php" ?>

