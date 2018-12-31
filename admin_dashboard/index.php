<!DOCTYPE html>
<html lang="en">

<?php require 'html_includes/head.html'; ?>

<body class="animsition">

    <div class="page-wrapper">

        <<?php require 'html_includes/menu_sidebar.html' ; ?>

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">

                                <div class="header-button">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix">

                                            <div>
                                                Admin
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->


                <!-- MAIN CONTENT-->
                <div class="main-content">

                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>description</th>
                                        <th>date</th>
                                        <th>status</th>
                                        <th>price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">lori@example.com</span>
                                        </td>
                                        <td class="desc">Samsung S8 Black</td>
                                        <td>2018-09-27 02:12</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>$679.00</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    
                                </tbody>
                            </table>
                        </div>



                </div>
            </div>

    </div>

    <?php require 'html_includes/scripts.html'; ?>

</body>

</html>
<!-- end document-->
