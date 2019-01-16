function ShowProgressBar(progressBarID) {
    document.getElementById(progressBarID).style.visibility = 'visible';
}

function HideProgressBar(progressBarID) {
    document.getElementById(progressBarID).style.visibility = 'hidden';
}

function SubmitDownloadPDF() {
    ShowProgressBar('cfPDFDownloaderProgressBarr');
    var pdf_problem_link = $("#pdf_problem_link").val();
    $.post("../back/download_pdf.php", {
            pdf_problem_link: pdf_problem_link
        },
        function(data) {
            HideProgressBar('cfPDFDownloaderProgressBarr');
            $('#pdf_result').html(data);
        });
}

function SubmitParseTestCases() {
    ShowProgressBar('cfSubmissionParserProgressBarr');
    var submission_link = $("#submission_link").val();
    $.post("../back/download_test_cases.php", {
            submission_link: submission_link
        },
        function(data) {
            HideProgressBar('cfSubmissionParserProgressBarr');
            $('#testcases_result').html(data);
        });

}

$(document).ready(function() {
    $(".delete-contest-button").click(function(evt) {
        var choice = confirm("By deleteing this contest you are deleting all the associated problems!\nAre you sure you want to proceed?");
        var id__ = $(this).attr("id");
        id__ = id__.replace('c', '');

        if (choice == true) {
            $.post(
                "../back/delete_contest.php", {
                    contest_id: id__
                },
                function(data) {
                    alert(data);
                    if (data == "Deleted successfully")
                        $("tr").remove(".contest-" + id__);
                });
        }


    });

    // Delete all submissions
    $("#delete-submissions-button").click(function(event) {
        $.post(
            "../back/delete_submission.php", {
                all: true
            },
            function(data) {
                alert(data);
            }
        );

    });

    $(".delete-problem-button").click(function(evt) {
        var choice = confirm("This is going to remove all the test cases and the problem pdf associated with this problem!\nAre you sure you want to proceed?");
        var id__ = $(this).attr("id");
        id__ = id__.replace('p', '');

        if (choice == true) {
            $.post(
                "../back/delete_problem.php", {
                    problem_id: id__
                },
                function(data) {
                    alert(data);
                    if (data == "Deleted successfully")
                        $("tr").remove(".problem-" + id__);
                });
        }


    });
});
