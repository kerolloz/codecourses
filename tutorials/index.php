<!doctype html>
<html>

<head>
    <title>CodeCourses</title>

    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!--include navigation bar from a preset php file-->
    <?php require "../navbar_control.php";?>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <!-- VideoContainer -->
                <div class="videooContainer">
                    <iframe width="750" height="500" src="https://www.youtube.com/embed/RRouhxZJKak" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="col-4">
                <!-- Accordion Collapse -->
                <div class="accordion1" id="accordion1">
                    <!-- Beginner section -->
                    <div class="card">
                        <div class="card-header" id="headingOne1">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1" style>
                                    BEGINNERS
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordion1">
                            <div class="card-body">
                                <br>
                                <a href="../tutorials/index.php">1- Data Types</a>
                                <br><br>
                                <a href="###">2- Operators</a>
                                <br><br>
                                <a href="###">3- Array</a>
                                <br><br>
                                <a href="###">4- String</a>
                                <br><br>
                                <a href="###">5- Loop</a>
                                <br><br>
                                <a href="###">6- Function</a>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <!-- intermediate section -->
                    <div class="card">
                        <div class="card-header" id="headingTwo2">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                    INTERMEDIATE
                                </button>
                            </h5>
                        </div>

                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordion1">
                            <div class="card-body">
                                <br>
                                <a href="###" target="_blank">1- Vector</a>
                                <br><br>
                                <a href="###" target="_blank">2- List</a>
                                <br><br>
                                <a href="###" target="_blank">3- Deque</a>
                                <br><br>
                                <a href="###" target="_blank">4- Queue</a>
                                <br><br>
                                <a href="###" target="_blank">5- Priority Queue</a>
                                <br><br>
                                <a href="###" target="_blank">6- Stack</a>
                                <br><br>
                                <a href="###" target="_blank">7- Set</a>
                                <br><br>
                                <a href="###" target="_blank">8- Map </a>
                                <br><br>
                                <a href="###" target="_blank">9- Binary Search</a>
                                <br><br>
                                <a href="###" target="_blank">10- Quick Sort</a>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <!-- Intermediate section -->
                    <div class="card">
                        <div class="card-header" id="headingThree3">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    ADVANCED
                                </button>
                            </h5>
                        </div>

                        <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordion1">
                            <div class="card-body">
                                <br>
                                <a href="###" target="_blank">1- Backtracking1</a>
                                <br><br>
                                <a href="###" target="_blank">2- Backtracking2</a>
                                <br><br>
                                <a href="###" target="_blank">3- Backtracking3</a>
                                <br><br>
                                <a href="###" target="_blank">4- Backtracking4</a>
                                <br><br>
                                <a href="###" target="_blank">5- Backtracking5</a>
                                <br><br>
                                <a href="###" target="_blank">6- Convex Hull</a>
                                <br><br>
                                <a href="###" target="_blank">7- Johnson’s algorithm</a>
                                <br><br>
                                <a href="###" target="_blank">8- Huffman Coding | Greedy Algo</a>
                                <br><br>
                                <a href="###" target="_blank">9- Minimum Partition</a>
                                <br><br>
                                <a href="###" target="_blank">10- Optimal Binary Search Tree</a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Resources and Problems Section -->
        <div class="row">
            <div class="col-6">
                <!-- Accordion Collapse -->
                <div class="accordion" id="accordionExample">
                    <!-- Resources -->
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style>
                                    Resources
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <br>
                                <a href="https://www.geeksforgeeks.org/c-data-types/" target="_blank">Article 1</a>
                                <br><br>
                                <a href="https://www.tutorialspoint.com/cplusplus/cpp_data_types.htm" target="_blank">Article 2</a>
                                <br><br>
                                <a href="http://www.cplusplus.com/doc/tutorial/variables/" target="_blank">Article 3</a>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <!-- Problems -->
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Problems
                                </button>
                            </h5>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <br>
                                <a href="###" target="_blank">Problem 1</a>
                                <br><br>
                                <a href="###" target="_blank">Problem 2</a>
                                <br><br>
                                <a href="###" target="_blank">Problem 3</a>
                                <br><br>
                                <a href="###" target="_blank">Problem 4</a>
                                <br><br>
                                <a href="###" target="_blank">Problem 5</a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section-->
    <?php require '../footer_include.php'; ?>

    <script src="../assets/bootstrap-4.1.3-dist/js/jQuery.js"></script>
    <script src="../assets/bootstrap-4.1.3-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>


</body>

</html>
