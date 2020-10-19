<?php
include('config/db.php');

$pollId = '';

if (isset($_POST['submit'])) {

    $started = true;

    $pollId = $_POST['polls'];

    echo  $pollId;

    $sql = "SELECT lga_name, polling_unit_name, party_abbreviation, party_score 
    FROM lga l, polling_unit p, announced_pu_results a 
    WHERE l.lga_id = p.lga_id AND
    p.polling_unit_id = a.polling_unit_uniqueid";

    //make query and get results

    $result = mysqli_query($conn, $sql);

    //fetch resulting rows as array

    $unitResults = mysqli_fetch_all($result, MYSQLI_ASSOC);

    print_r($unitResults) ;


    //free result from memory
    mysqli_free_result($result);

    //close database
    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Bincome test</title>

</head>

<body>
    <form action="poll.php" method="POST">
        <label for="lgas">Choose a Local government:</label>
        <select name="polls">
            <option value="Aniocha North">Aniocha North</option>
            <option value="Aniocha - South">Aniocha South</option>
            <option value="Ethiope East">Ethiope East</option>
            <option value="Ethiope West">Ethiope West</option>
            <option value="Ika North - East">Ika North-East</option>
            <option value="Ika - South">Ika-South</option>
            <option value="Isoko North">Isoko-North</option>
            <option value="Isoko South">Isoko-South</option>
            <option value="Ndokwa East">Ndokwa-East</option>
            <option value="Ndokwa West">Ndokwa West</option>
            <option value="Okpe">Okpe</option>
            <option value="Oshimili - North">Oshimili - North</option>
            <option value="Oshimili - South">Oshimili - South</option>
            <option value="Patani">Patani</option>
            <option value="Sapele">Sapele</option>
            <option value="Udu">Udu</option>
            <option value="Ughelli North">Ughelli North</option>
            <option value="Ughelli South">Ughelli South</option>
            <option value="Ukwuani">Ukwuani</option>
            <option value="Uvwie">Uvwie</option>
            <option value="Bomadi">Bomadi</option>
            <option value="Burutu">Burutu</option>
            <option value="Warri North">Warri North</option>
            <option value="Warri South">Warri South</option>
            <option value="Warri South West">Warri South West</option>
        </select>
        <br><br>
        <input type="submit" name="submit">
    </form>

    <table>
        <tr>
            <th>Local government Area</th>
            <th>Polling Unit Name</th>
            <th>Party</th>
            <th>Party Score</th>
        </tr>
        <?php
        if ($started === true) : ?>
            <?php
            foreach ($unitResults as $unitResult) : ?>
                <?php foreach ($unitResult as $key=>$name) : ?>
                    <tr>
                        <td><?php echo $name=$pollId ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php  ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <!-- //having issues cycling through array -->
            
    </table>
<?php endif ?>



</body>