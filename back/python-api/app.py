from flask import Flask, request
import pdfkit
import PyPDF2

def cut_problem_pdf(pdf_name, out_name):
    with open(pdf_name, "rb") as in_f:
        input1 = PyPDF2.PdfFileReader(in_f)
        output = PyPDF2.PdfFileWriter()

        num_pages = input1.getNumPages()

        for i in range(num_pages):
            page = input1.getPage(i)
            page.cropBox.lowerLeft = (10, 0)
            if i == 0:  # if it's the first page cut the navigation bar
                page.cropBox.upperRight = (415, 705)
            else:
                page.cropBox.upperRight = (415, page.mediaBox.getUpperRight_y())
            output.addPage(page)

        with open(out_name, "wb") as out_f:
            output.write(out_f)


def download_problem_pdf(url, name):
    options = {
        'margin-top': '3px',
        'margin-right': '8px',
        'margin-left': '8px',
        'margin-bottom': '3px',
    }
    pdfkit.from_url(url, name, options=options)


app = Flask(__name__)


@app.route('/')
def main():
    import os
    os.chdir(os.path.dirname(os.path.realpath(__file__)))
    link = request.args.get('link')
    out_name = "problem.pdf"
    pdf_name = "original_problem.pdf"
    download_problem_pdf(link, pdf_name)
    cut_problem_pdf(pdf_name, out_name)
    os.remove(pdf_name)
    return "problem.pdf"


if __name__ == '__main__':
    app.run()
