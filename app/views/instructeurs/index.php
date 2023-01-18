<h3><?= $data['title'] ?></h3>
<table>
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>Datum in dienst</th>
        <th>Toevoegen Auto</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?>/landingpages/index">back to landingpage</a></p>