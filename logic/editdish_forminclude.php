<select name="status">
    <option value="<?php echo $status_id ?>" selected><?php echo $status ?></option>
    <?php
    $sql = "SELECT * FROM status";
    $results = $mysql->query($sql);
    while ($currentrow = $results->fetch_assoc()) {
        echo "<option value='" . $currentrow["status_id"] . "'>" . $currentrow["status"] . "</option>";
    }
    ?>
</select>