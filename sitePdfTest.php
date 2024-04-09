
<?php
$result = $db->getSoils();
$count = 0;
echo '<table width="80%"><tbody><tr>';
while ($row = mysqli_fetch_array($result)) {
    if ($count % 2 == 0 && $count != 0) {
        echo '</tr><tr>';
    }
    ?>
    <td width="50%" style="vertical-align: top;">
        <div style="display: flex; align-items: center;">
            <div class="<?php echo in_array($row['soil_id'], $selectedSources) ? 'check' : 'checkbox'; ?>">
                <input type="check" name="source_<?php echo $row['soil_id']; ?>" <?php echo in_array($row['soil_id'], $selectedSources) ? 'checked' : ''; ?>>
               
            </div>
            <?php if (!empty($row['soil_name'])): ?>
                <label for="source_<?php echo $row['soil_id']; ?>"><?php echo $row['soil_name']; ?></label>
            <?php endif; ?>
        </div>
    </td>
    <?php
    $count++;
}

echo '</tr></tbody></table>';
?>


        <!-- Hrerere -->

        
            
        <table width="100%">
            <tbody>
            <?php
            $result = $db->getSiteSoil($_GET['site_id']);
while($row = mysqli_fetch_object($result)) {
    $soilId = $row->soil_id;
    ?>
                <tr>
                  <td >Soil Type:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label"><?=$row['soil_id']?></label>
                    </td>
                </tr>
                <?php
}
?>   
?>
            </tbody>
        </table>