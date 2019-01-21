#!/usr/bin/python3
import urllib.request
import os
import re
import sys

try:
    from bs4 import BeautifulSoup
except Exception as e:
    raise e

soup = None


def parse_it(div_class, file_name):
    global soup
    element = "input" if file_name == "in" else "output"
    file_name = "." + file_name
    test_number = 0
    for div in soup.find_all("div", div_class):
        test_number += 1
        # print(">> Parsing", element, "#", test_number)
        with open(str(test_number) + file_name, 'w') as out_file:
            out_file.writelines(
                div.contents[len(div.contents) - 2].pre.contents)

    return test_number


def main():
    problem_link = sys.argv[1]
    # print(">> Please wait while downloading the submission content")
    try:
        my_request = urllib.request.urlopen(problem_link)
        my_html = my_request.read()
    except Exception as __connection_error__:
        # print(">> Something went wrong while reading the submission link!", __connection_error__)
        return -1

    # print(">> Submission HTML Downloaded successfully")
    # print(">> Extraction input and output from submission HTML")

    numbers_in_link = re.findall("([0-9]+)", problem_link)  # numbers

    contest_number = numbers_in_link[0]
    submission_number = numbers_in_link[1]

    dir_name = str(contest_number) + '_' + str(submission_number)

    # create a directory named after the submission number and contest number
    os.system("mkdir " + dir_name)
    os.chdir("./" + str(dir_name))
    os.system('mkdir test_cases')
    os.chdir("./test_cases")

    global soup
    soup = BeautifulSoup(my_html, "html.parser")

    number_of_testcases = parse_it("file input-view", "in")
    if parse_it("file answer-view", "out"):
        # print(">> Parsed", number_of_testcases, "test case")
        # print(">> DONE!",
        print(dir_name)
        os.chdir("..")
        with open("number_of_test_cases.txt", "w") as n_ts:
            n_ts.write(str(number_of_testcases))
    else:
        print(">> Something went WRONG!")


if __name__ == '__main__':
    main()
