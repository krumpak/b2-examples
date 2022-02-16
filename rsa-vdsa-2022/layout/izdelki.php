<?php
  $title = 'Izdelki';
?>

<?php include './glava.php'; ?>

<table border="1">
  <?php
    $array = [
      'procesor',
      'RAM',
      'ROM',
      'Disk'
    ];
    foreach ($array as $value) : ?>
      <tr>
        <td><?php echo $value; ?></td>
      </tr>
    <?php endforeach; ?>
</table>

<?php include './noga.php'; ?>