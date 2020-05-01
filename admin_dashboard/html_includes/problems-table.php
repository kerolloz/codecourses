<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <h3 class="title-5">problems table</h3>
            </div>
            <div class="table-data__tool-right">
                <a href="problem.php">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="fas fa-plus"></i>
                        add problem
                    </button>
                </a>
            </div>
        </div>
        <div class="table-responsive table--no-card">
            <table class="table table-borderless table-striped table-earning table-data2 table-data3 black-table">
                <thead>
                <tr>
                    <th>Problem ID</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Types</th>
                    <th>Number Of Solvers</th>
                    <th>Time Limit</th>
                    <th>Memory Limit</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = $connection->query($select_problems_sql_stmnt_string);
                if (isset($result->num_rows) && $result->num_rows) {
                    while ($row = $result->fetch_assoc()):

                        ?>
                        <tr class="tr-shadow problem-<?= $row['problem_id'] ?>">

                            <td><?= $row['problem_id'] ?></td>
                            <td>
                                <a href="../problem/?id=<?= $row['problem_id'] ?>">
                                    <?= $row['name'] ?>
                                </a>
                            </td>
                            <td><?= $row['level'] ?></td>
                            <td><?= $row['types'] ?></td>
                            <td><?= $row['number_of_solvers'] ?></td>
                            <td><?= $row['time_limit'] ?></td>
                            <td><?= $row['memory_limit'] ?></td>

                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button id="p<?= $row['problem_id'] ?>" class="item delete-problem-button"
                                            data-toggle="tooltip" type="button" data-placement="top" title=""
                                            data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>

                    <?php endwhile;
                } else {
                    echo "<tr class='tr-shadow'>
                            <td class='text-lg-center' colspan='8'>
                                NO AVAILABLE PROBLEMS
                            </td>
                        </tr>";
                } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
