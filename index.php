<?php

include('config/db.php');



if (isset($_POST['submit'])) {

    $started = true;

    $pollId = $_POST['number'];

    $sql = "SELECT * FROM `announced_pu_results` WHERE polling_unit_uniqueid = $pollId";

    //make query and get results

    $result = mysqli_query($conn, $sql);

    //fetch resulting rows as array

    $unitResults = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    //close database
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>
<form action="index.php" method="POST">

    <label>Please enter a Unique poll Id:</label>
    <input type="number" name="number" required>
    <input type="submit" name="submit" value="submit">

</form>

<table>
    <tr>
        <th>Polling Unit No</th>
        <th>Party</th>
        <th>Party Score</th>
        <th>Entered User</th>
    </tr>
    <?php
       if ($started === true) : ?>
        <?php
        foreach ($unitResults as $unitResult) : ?>
            <tr>
                <td><?php echo $unitResult['polling_unit_uniqueid'] ?></td>
                <td><?php echo $unitResult['party_abbreviation'] ?></td>
                <td><?php echo $unitResult['party_score'] ?></td>
                <td><?php echo $unitResult['entered_by_user'] ?></td>
            </tr>

        <?php endforeach; ?>


</table>
<?php endif ?>


<?php include('templates/footer.php'); ?>
</body>

</html>