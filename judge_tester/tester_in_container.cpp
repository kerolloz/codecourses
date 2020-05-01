#include <iostream>
#include <fstream>

using namespace std;

int main(int argc, char *argv[]) {
    string time_limit = "0";
    string submission_id;

    if (argc == 3) {
        time_limit = argv[1]; // (time limit) as a string from first argument
        submission_id = argv[2]; // (submission id) as a string from second arugemt
    } else {
        return 11; // missing arguments
    }

    int ret_val = 0;
    int number_of_test_cases = 0;

    string problem_dir_my_out = "/user_out/";
    string problem_dir_in_out = "/problem/test_cases/";
    string object_file_name = " /source_codes/" + submission_id + ".out";
    string line;

    system(("mkdir " + problem_dir_my_out).c_str());
    ifstream my_file("/problem/number_of_test_cases.txt");
    if (my_file.is_open()) {
        if (getline(my_file, line)) {
            // read only the first line, to avoid blank lines at end of file(produces an error)
            number_of_test_cases = stoi(line);
        }
        my_file.close();
    }
    if (!number_of_test_cases)
        return 15; // Error reading number_of_test_cases file

    bool judged = false;

    for (int i = 1; i <= number_of_test_cases; i++) {
        judged = true;
        string input_file = problem_dir_in_out + to_string(i) + ".in";
        string run_command =
                "timeout " + time_limit + object_file_name +
                " < " + input_file +
                " > " + problem_dir_my_out +
                to_string(i) + ".out";
        ret_val = system(run_command.c_str());
        if (ret_val == 31744) return 124; // TLE
        else if (ret_val != 0) return ret_val; // couldn't read input file
        string diff_command =
                "diff -s -q -Z " + problem_dir_my_out + to_string(i) + ".out " + problem_dir_in_out + to_string(i) +
                ".out &>/dev/null";
        ret_val = system(diff_command.c_str());
        if (ret_val != 0) return 1; // WRONG ANSWER
    }

    if (judged)
        return 0; // ACCEPTED
    else
        return -1; // means that there's some problem in judging

}
