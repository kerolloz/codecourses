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
    $(".delete-class").click(function(evt) {
        var choice = confirm("By deleteing this contest you are deleting all the associated problems! Are you sure you want to proceed?");
		var id__ = $(this).attr("id");
		if (choice == true) {
            $.post(
                "../back/delete_contest.php", {
                    contest_id: $(this).attr("id")
                },
                function(data) {
					alert(data);
					if(data == "Deleted successfully")
						$("tr").remove("."+id__);
                });
        }


    });
});
