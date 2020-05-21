<?php include './includes/header.php' ?>

<?php
    // Configuration
    include './includes/config.php';

    $id = 1;

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    //Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/'.$id);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($data);
    //echo '<pre>';
    //print_r($data);
    //echo '</pre>';

?>

<main class="container">
    <h1>Find your pokemon here :</h1>
    <form action="#" method="get">
        <input type="text" name="id" placeholder="bulbasaur">
        <input type="submit" value="Search">
    </form>


    <h3>This is your <?= ucfirst($data->forms[0]->name) ?></h3>
    <img src="<?= $data->sprites->front_default ?>" alt="">


    <!--Pokemon data-->
    <table>
        <tr>
            <th>Index</th>
            <td>N° <?= $data->game_indices[0]->game_index ?></td>
        </tr>
        <tr>
            <th>Weight</th>
            <td><?= $data->weight ?>kg</td>
        </tr>
        <tr>
            <th>Type</th>
            <td><?= $data->types[0]->type->name ?></td>
        </tr>
        <tr>
            <th>Main abilities</th>
            <td><?= $data->abilities[0]->ability->name ?> & <?= $data->abilities[1]->ability->name ?></td>
        </tr>
    </table>

    <div class="button">
        <a href="index.php">Main page</a>
    </div>
</main>

<?php include './includes/footer.php' ?>