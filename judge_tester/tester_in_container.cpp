#include <bits/stdc++.h>

using namespace std;

int main (int argc, char *argv[])  {
	string time_limit = "0";

	if(argc > 1){
		time_limit = argv[1]; // time limit as a string from first argument
	}
	else {
		return 11; // NO time limit argument passed
	}

	int ret_val = 0;
	int number_of_test_cases = 0;
	// TODO: copy executable file into container
	// my_out folder be inside the container. no need to keep the user output
	// read only volumes
	string problem_dir_my_out = "/user_out/";
	string problem_dir_in_out = "/problem/test_cases/";
	string object_file_name = " /source_codes/a.out --signal=SIGKILL";
	string line;

	ifstream myfile("/problem/number_of_test_cases.txt");
	if (myfile.is_open())
	{
		if ( getline(myfile,line) ) // read only the first line, to avoid blank lines at end of file(produces an error)
		{
		  number_of_test_cases = stoi(line);
		}
		myfile.close();
	}
	if(!number_of_test_cases)
		return 15;

	bool judged = false;

	for(int i = 1; i <= number_of_test_cases; i++){
		judged = true;
	    string input_file = problem_dir_in_out + to_string(i) +".in";
	    string run_command = "timeout " + time_limit +  object_file_name + " < " + input_file + " > " + problem_dir_my_out + to_string(i) + ".out";
	    ret_val = system(run_command.c_str());
	    if(ret_val == 31744) return 124;
	    string diff_command = "diff -s -q -Z " + problem_dir_my_out  + to_string(i) + ".out " + problem_dir_in_out + to_string(i) + ".out";
	    ret_val = system(diff_command.c_str());
	    if(ret_val != 0) return 1;
	}

	if(judged)
		return 0;
	else
		return -1; // means that there's some problem in judging

}
