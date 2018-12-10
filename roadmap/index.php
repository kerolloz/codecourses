<!doctype html>
<html>
    <head>
        <title>CodeCourses</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        
        <br>
        
        
        <!-- Articl Section -->
        
        <div class="articl">
            <h1  style="color:#2B3386;">How to prepare for ACM - ICPC?</h1>
            <p>ACM ICPC(Association for Computing Machinery - International Collegiate Programming Contest) <br><br> is a world-wide annual multi-tiered programming contest being organized for over thirteen years. The contest is sponsored by IBM.</p>
            <h3 style="color:#2B3386;">A sample ICPC Problem : A usual ICPC problem has the following features: </h3>
            <p><b>1- Problem statement: </b>describing the problem and what output is to be generated.</p>
            <p><b>2- Input:</b> Make sure that you read this section with complete attention as missing out     any minor detail may land you in wrong answer zone.  </p>
            <p><b>3- Output: </b> Just like above, this one also should be read carefully. </p>
            <p><b>4- Constraints:</b> These can include constraints on input, time, memory, code size, etc. </p>
            <p><b>5- Time limit: </b>See if your algorithm can work in this range. If not, time to change it!</p>
            <p><b>6- Memory limit:  </b> If you are fond of allocating memory for every small thing, it's a good time that you changed it.</p>
        </div>
        
        <hr>
        
        <div class="study">
            <h3 style="color:#2B3386;"><b>What to study?</b></h3>
            <p>Knowing just the basics of programming won't be fruitful for aspirants of ACM ICPC. One needs to have a thorough knowledge of advanced algorithms used as well.<br><br> Following Topics list out the necessary Topics and Algorithms that one must surely know to improve and stand a chance in the actual competition.</p>
        </div>
        
        <br>
        
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
                        <a href="https://www.geeksforgeeks.org/c-data-types/" target="_blank">1- Data Types</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/operators-c-c/" target="_blank">2- Operators</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/arrays-in-c-cpp/" target="_blank">3- Array</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/string-data-structure/" target="_blank">4- String</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/loops-in-c-sharp/" target="_blank">5- Loop</a>
                        <br><br>    
                        <a href="https://www.geeksforgeeks.org/functions-in-c/" target="_blank">6- Function</a>
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
                        <a href="https://www.geeksforgeeks.org/vector-in-cpp-stl/" target="_blank">1- Vector</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/list-cpp-stl/" target="_blank">2- List</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/deque-cpp-stl/" target="_blank">3- Deque</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/queue-cpp-stl/" target="_blank">4- Queue</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/priority-queue-in-cpp-stl/" target="_blank">5- Priority Queue</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/stack-in-cpp-stl/" target="_blank">6- Stack</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/set-in-cpp-stl/" target="_blank">7- Set</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/map-associative-containers-the-c-standard-template-library-stl/" target="_blank">8- Map </a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/binary-search/" target="_blank">9- Binary Search</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/quick-sort/" target="_blank">10- Quick Sort</a>
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
                        <a href="https://www.geeksforgeeks.org/rat-in-a-maze-backtracking-2/" target="_blank">1- Backtracking1</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/n-queen-problem-backtracking-3/" target="_blank">2- Backtracking2</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/subset-sum-backtracking-4/" target="_blank">3- Backtracking3</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/m-coloring-problem-backtracking-5/" target="_blank">4- Backtracking4</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/hamiltonian-cycle-backtracking-6/" target="_blank">5- Backtracking5</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/convex-hull-set-1-jarviss-algorithm-or-wrapping/" target="_blank">6- Convex Hull</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/johnsons-algorithm/" target="_blank">7- Johnson’s algorithm</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/huffman-coding-greedy-algo-3/" target="_blank">8- Huffman Coding | Greedy Algo</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/partition-a-set-into-two-subsets-such-that-the-difference-of-subset-sums-is-minimum//" target="_blank">9- Minimum Partition</a>
                        <br><br>
                        <a href="https://www.geeksforgeeks.org/optimal-binary-search-tree-dp-24/" target="_blank">10- Optimal Binary Search Tree</a>
                        <br><br>
                    </div>
                </div>
            </div>
        
        </div>
        
        

        <!-- Footer Section-->
        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

        <script src="js/jQuery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>