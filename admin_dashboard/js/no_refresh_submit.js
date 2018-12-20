
function ShowProgressBar(progressBarID) {
	document.getElementById(progressBarID).style.visibility = 'visible';
}
function HideProgressBar(progressBarID) {
	document.getElementById(progressBarID).style.visibility = 'hidden';
}

function SubmitDownloadPDF() {
	ShowProgressBar('cfPDFDownloaderProgressBarr');
    var pdf_problem_link = $("#pdf_problem_link").val();
    $.post("../back/download_pdf.php", {pdf_problem_link: pdf_problem_link },
    function(data) {
	 	HideProgressBar('cfPDFDownloaderProgressBarr');
		$('#pdf_result').html(data);
    });
}

function SubmitParseTestCases() {
	ShowProgressBar('cfSubmissionParserProgressBarr');
    var submission_link = $("#submission_link").val();
    $.post("../back/download_test_cases.php", {submission_link: submission_link },
    function(data) {
		HideProgressBar('cfSubmissionParserProgressBarr');
		$('#testcases_result').html(data);	 
    });

}