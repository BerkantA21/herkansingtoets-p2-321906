<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/instructeurs/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>Kenteken:</td>
                <td><input type="text" name="Kenteken" id="Kenteken" value="<?= $data['Kenteken']; ?>"></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td><input type="text" name="Type" id="Type" value="<?= $data['Type']; ?>"></td>
            </tr>
            <tr>
                <td>Bouwjaar:</td>
                <td><input type="text" name="Bouwjaar" id="Bouwjaar" value="<?= $data['Bouwjaar']; ?>"></td>
            </tr>
            <tr>
                <td>Brandstof:</td>
                <td><input type="text" name="Brandstof" id="Brandstof" value="<?= $data['Brandstof']; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" id="id" value="<?= $data['Id']; ?>"></td>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>