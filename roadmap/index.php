<!doctype html>
<html>
    <head>
        <title>CodeCourses</title>
        <link rel="stylesheet" href = "/codecourses/assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/codecourses/styles/style.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../styles/style.css">
       
    </head>
    <body>
       
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        <br>
        <div class="container">
            
            <!-- Map Section -->
            <div class="row">
                <div class="col">
                    <!-- Accordion Collapse -->
                    <div class="accordion" id="accordionExample">
                        <!-- Beginner section -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                            style>
                                        BEGINNERS
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <br> 
                                    <a href="../TutorialsPage/index.html" target="_blank">1- Data Types</a>
                                    <br><br>
                                    <a href="#" target="_self">2- Operators</a>
                                    <br><br>
                                    <a href="#" target="_self">3- Array</a>
                                    <br><br>
                                    <a href="#" target="_self">4- String</a>
                                    <br><br>
                                    <a href="#" target="_self">5- Loop</a>
                                    <br><br>    
                                    <a href="#" target="_self">6- Function</a>
                                    <br><br>
                                </div>
                            </div>
                        </div>

                        <!-- intermediate section -->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        INTERMEDIATE
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    ADVANCED
                                </button>
                              </h5>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
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
        </div>     



        <script src = "/codecourses/assets/bootstrap-4.1.3-dist/js/jQuery.js"></script>
        <script src = "/codecourses/assets/bootstrap-4.1.3-dist/js/bootstrap.js"></script>
        <script src= "/codecourses/scripts/script.js"></script>

    </body>
</html>