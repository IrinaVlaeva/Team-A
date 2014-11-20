<?php include "templates/include/header.php" ?>

      <div id="adminHeader">
        <h2>Widget News Admin</h2>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>

      <h1>All Tests</h1>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

      <table>
        <tr>
          <th>Publication Date</th>
          <th>Test</th>
        </tr>

<?php foreach ( $results['tests'] as $test ) { ?>

        <tr onclick="location='admin.php?action=editTest&amp;testId=<?php echo $test->id?>'">
          <td><?php echo date('j M Y', $test->publicationDate)?></td>
          <td>
            <?php echo $test->title?>
          </td>
        </tr>

<?php } ?>

      </table>

      <p><?php echo $results['totalRows']?> test<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a href="admin.php?action=newTest">Add a New Test</a></p>

<?php include "templates/include/footer.php" ?>

